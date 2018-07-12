-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.21-log - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for yarsi_ibnu
CREATE DATABASE IF NOT EXISTS `yarsi_ibnu` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `yarsi_ibnu`;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table yarsi_ibnu.aspek_penilaian: ~21 rows (approximately)
/*!40000 ALTER TABLE `aspek_penilaian` DISABLE KEYS */;
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
/*!40000 ALTER TABLE `aspek_penilaian` ENABLE KEYS */;

-- Dumping structure for table yarsi_ibnu.aspek_penilaian_tipe
CREATE TABLE IF NOT EXISTS `aspek_penilaian_tipe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `order` tinyint(4) DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1. Active, 2. Non Active',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table yarsi_ibnu.aspek_penilaian_tipe: ~3 rows (approximately)
/*!40000 ALTER TABLE `aspek_penilaian_tipe` DISABLE KEYS */;
INSERT INTO `aspek_penilaian_tipe` (`id`, `nama`, `order`, `is_active`) VALUES
	(1, 'Umum', 4, 1),
	(2, 'Wawancara Pendalaman', 2, 1),
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

-- Dumping data for table yarsi_ibnu.auth_assignment: ~2 rows (approximately)
/*!40000 ALTER TABLE `auth_assignment` DISABLE KEYS */;
INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
	('Interviewer', '10', 1530715300),
	('Interviewer', '15', 1530636027),
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

-- Dumping data for table yarsi_ibnu.auth_item: ~166 rows (approximately)
/*!40000 ALTER TABLE `auth_item` DISABLE KEYS */;
INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
	('/*', 2, NULL, NULL, NULL, 1521567615, 1521567615),
	('/admin/*', 2, NULL, NULL, NULL, 1521567610, 1521567610),
	('/admin/assignment/*', 2, NULL, NULL, NULL, 1521567608, 1521567608),
	('/admin/assignment/assign', 2, NULL, NULL, NULL, 1521567608, 1521567608),
	('/admin/assignment/index', 2, NULL, NULL, NULL, 1521567608, 1521567608),
	('/admin/assignment/revoke', 2, NULL, NULL, NULL, 1521567608, 1521567608),
	('/admin/assignment/view', 2, NULL, NULL, NULL, 1521567608, 1521567608),
	('/admin/default/*', 2, NULL, NULL, NULL, 1521567608, 1521567608),
	('/admin/default/index', 2, NULL, NULL, NULL, 1521567608, 1521567608),
	('/admin/menu/*', 2, NULL, NULL, NULL, 1521567608, 1521567608),
	('/admin/menu/create', 2, NULL, NULL, NULL, 1521567608, 1521567608),
	('/admin/menu/delete', 2, NULL, NULL, NULL, 1521567608, 1521567608),
	('/admin/menu/index', 2, NULL, NULL, NULL, 1521567608, 1521567608),
	('/admin/menu/update', 2, NULL, NULL, NULL, 1521567608, 1521567608),
	('/admin/menu/view', 2, NULL, NULL, NULL, 1521567608, 1521567608),
	('/admin/permission/*', 2, NULL, NULL, NULL, 1521567609, 1521567609),
	('/admin/permission/assign', 2, NULL, NULL, NULL, 1521567609, 1521567609),
	('/admin/permission/create', 2, NULL, NULL, NULL, 1521567609, 1521567609),
	('/admin/permission/delete', 2, NULL, NULL, NULL, 1521567609, 1521567609),
	('/admin/permission/index', 2, NULL, NULL, NULL, 1521567609, 1521567609),
	('/admin/permission/remove', 2, NULL, NULL, NULL, 1521567609, 1521567609),
	('/admin/permission/update', 2, NULL, NULL, NULL, 1521567609, 1521567609),
	('/admin/permission/view', 2, NULL, NULL, NULL, 1521567609, 1521567609),
	('/admin/role/*', 2, NULL, NULL, NULL, 1521567609, 1521567609),
	('/admin/role/assign', 2, NULL, NULL, NULL, 1521567609, 1521567609),
	('/admin/role/create', 2, NULL, NULL, NULL, 1521567609, 1521567609),
	('/admin/role/delete', 2, NULL, NULL, NULL, 1521567609, 1521567609),
	('/admin/role/index', 2, NULL, NULL, NULL, 1521567609, 1521567609),
	('/admin/role/remove', 2, NULL, NULL, NULL, 1521567609, 1521567609),
	('/admin/role/update', 2, NULL, NULL, NULL, 1521567609, 1521567609),
	('/admin/role/view', 2, NULL, NULL, NULL, 1521567609, 1521567609),
	('/admin/route/*', 2, NULL, NULL, NULL, 1521567610, 1521567610),
	('/admin/route/assign', 2, NULL, NULL, NULL, 1521567609, 1521567609),
	('/admin/route/create', 2, NULL, NULL, NULL, 1521567609, 1521567609),
	('/admin/route/index', 2, NULL, NULL, NULL, 1521567609, 1521567609),
	('/admin/route/refresh', 2, NULL, NULL, NULL, 1521567610, 1521567610),
	('/admin/route/remove', 2, NULL, NULL, NULL, 1521567609, 1521567609),
	('/admin/rule/*', 2, NULL, NULL, NULL, 1521567610, 1521567610),
	('/admin/rule/create', 2, NULL, NULL, NULL, 1521567610, 1521567610),
	('/admin/rule/delete', 2, NULL, NULL, NULL, 1521567610, 1521567610),
	('/admin/rule/index', 2, NULL, NULL, NULL, 1521567610, 1521567610),
	('/admin/rule/update', 2, NULL, NULL, NULL, 1521567610, 1521567610),
	('/admin/rule/view', 2, NULL, NULL, NULL, 1521567610, 1521567610),
	('/admin/user/*', 2, NULL, NULL, NULL, 1521567610, 1521567610),
	('/admin/user/activate', 2, NULL, NULL, NULL, 1521567610, 1521567610),
	('/admin/user/change-password', 2, NULL, NULL, NULL, 1521567610, 1521567610),
	('/admin/user/delete', 2, NULL, NULL, NULL, 1521567610, 1521567610),
	('/admin/user/index', 2, NULL, NULL, NULL, 1521567610, 1521567610),
	('/admin/user/login', 2, NULL, NULL, NULL, 1521567610, 1521567610),
	('/admin/user/logout', 2, NULL, NULL, NULL, 1521567610, 1521567610),
	('/admin/user/request-password-reset', 2, NULL, NULL, NULL, 1521567610, 1521567610),
	('/admin/user/reset-password', 2, NULL, NULL, NULL, 1521567610, 1521567610),
	('/admin/user/signup', 2, NULL, NULL, NULL, 1521567610, 1521567610),
	('/admin/user/view', 2, NULL, NULL, NULL, 1521567610, 1521567610),
	('/aspek-penilaian-tipe/*', 2, NULL, NULL, NULL, 1530554523, 1530554523),
	('/aspek-penilaian-tipe/create', 2, NULL, NULL, NULL, 1530554523, 1530554523),
	('/aspek-penilaian-tipe/delete', 2, NULL, NULL, NULL, 1530554523, 1530554523),
	('/aspek-penilaian-tipe/delete-items', 2, NULL, NULL, NULL, 1530554523, 1530554523),
	('/aspek-penilaian-tipe/index', 2, NULL, NULL, NULL, 1530554523, 1530554523),
	('/aspek-penilaian-tipe/update', 2, NULL, NULL, NULL, 1530554523, 1530554523),
	('/aspek-penilaian-tipe/view', 2, NULL, NULL, NULL, 1530554523, 1530554523),
	('/aspek-penilaian/*', 2, NULL, NULL, NULL, 1530554207, 1530554207),
	('/aspek-penilaian/create', 2, NULL, NULL, NULL, 1530554207, 1530554207),
	('/aspek-penilaian/delete', 2, NULL, NULL, NULL, 1530554207, 1530554207),
	('/aspek-penilaian/delete-items', 2, NULL, NULL, NULL, 1530554207, 1530554207),
	('/aspek-penilaian/index', 2, NULL, NULL, NULL, 1530554207, 1530554207),
	('/aspek-penilaian/update', 2, NULL, NULL, NULL, 1530554207, 1530554207),
	('/aspek-penilaian/view', 2, NULL, NULL, NULL, 1530554207, 1530554207),
	('/debug/*', 2, NULL, NULL, NULL, 1521567614, 1521567614),
	('/debug/default/*', 2, NULL, NULL, NULL, 1521567614, 1521567614),
	('/debug/default/db-explain', 2, NULL, NULL, NULL, 1521567614, 1521567614),
	('/debug/default/download-mail', 2, NULL, NULL, NULL, 1521567614, 1521567614),
	('/debug/default/index', 2, NULL, NULL, NULL, 1521567614, 1521567614),
	('/debug/default/toolbar', 2, NULL, NULL, NULL, 1521567614, 1521567614),
	('/debug/default/view', 2, NULL, NULL, NULL, 1521567614, 1521567614),
	('/debug/user/*', 2, NULL, NULL, NULL, 1521567614, 1521567614),
	('/debug/user/reset-identity', 2, NULL, NULL, NULL, 1521567614, 1521567614),
	('/debug/user/set-identity', 2, NULL, NULL, NULL, 1521567614, 1521567614),
	('/fakultas-unit/*', 2, NULL, NULL, NULL, 1530624267, 1530624267),
	('/fakultas-unit/create', 2, NULL, NULL, NULL, 1530624267, 1530624267),
	('/fakultas-unit/delete', 2, NULL, NULL, NULL, 1530624267, 1530624267),
	('/fakultas-unit/delete-items', 2, NULL, NULL, NULL, 1530624267, 1530624267),
	('/fakultas-unit/index', 2, NULL, NULL, NULL, 1530624267, 1530624267),
	('/fakultas-unit/update', 2, NULL, NULL, NULL, 1530624267, 1530624267),
	('/fakultas-unit/view', 2, NULL, NULL, NULL, 1530624267, 1530624267),
	('/formulir/*', 2, NULL, NULL, NULL, 1530624259, 1530624259),
	('/formulir/create', 2, NULL, NULL, NULL, 1530624259, 1530624259),
	('/formulir/delete', 2, NULL, NULL, NULL, 1530624259, 1530624259),
	('/formulir/delete-items', 2, NULL, NULL, NULL, 1530624259, 1530624259),
	('/formulir/index', 2, NULL, NULL, NULL, 1530624259, 1530624259),
	('/formulir/keputusan-interviewer', 2, NULL, NULL, NULL, 1531331268, 1531331268),
	('/formulir/update', 2, NULL, NULL, NULL, 1530624259, 1530624259),
	('/formulir/view', 2, NULL, NULL, NULL, 1530624259, 1530624259),
	('/gridview/*', 2, NULL, NULL, NULL, 1521567613, 1521567613),
	('/gridview/export/*', 2, NULL, NULL, NULL, 1521567613, 1521567613),
	('/gridview/export/download', 2, NULL, NULL, NULL, 1521567613, 1521567613),
	('/jabatan/*', 2, NULL, NULL, NULL, 1530624196, 1530624196),
	('/jabatan/create', 2, NULL, NULL, NULL, 1530624196, 1530624196),
	('/jabatan/delete', 2, NULL, NULL, NULL, 1530624196, 1530624196),
	('/jabatan/delete-items', 2, NULL, NULL, NULL, 1530624196, 1530624196),
	('/jabatan/index', 2, NULL, NULL, NULL, 1530624196, 1530624196),
	('/jabatan/update', 2, NULL, NULL, NULL, 1530624196, 1530624196),
	('/jabatan/view', 2, NULL, NULL, NULL, 1530624196, 1530624196),
	('/jadwal-wawancara/*', 2, NULL, NULL, NULL, 1530640081, 1530640081),
	('/jadwal-wawancara/create', 2, NULL, NULL, NULL, 1530640081, 1530640081),
	('/jadwal-wawancara/delete', 2, NULL, NULL, NULL, 1530640081, 1530640081),
	('/jadwal-wawancara/delete-items', 2, NULL, NULL, NULL, 1530640081, 1530640081),
	('/jadwal-wawancara/index', 2, NULL, NULL, NULL, 1530640081, 1530640081),
	('/jadwal-wawancara/update', 2, NULL, NULL, NULL, 1530640081, 1530640081),
	('/jadwal-wawancara/view', 2, NULL, NULL, NULL, 1530640081, 1530640081),
	('/keputusan-tipe/*', 2, NULL, NULL, NULL, 1530624267, 1530624267),
	('/keputusan-tipe/create', 2, NULL, NULL, NULL, 1530624267, 1530624267),
	('/keputusan-tipe/delete', 2, NULL, NULL, NULL, 1530624267, 1530624267),
	('/keputusan-tipe/delete-items', 2, NULL, NULL, NULL, 1530624267, 1530624267),
	('/keputusan-tipe/index', 2, NULL, NULL, NULL, 1530624267, 1530624267),
	('/keputusan-tipe/update', 2, NULL, NULL, NULL, 1530624267, 1530624267),
	('/keputusan-tipe/view', 2, NULL, NULL, NULL, 1530624267, 1530624267),
	('/log-error/*', 2, NULL, NULL, NULL, 1526294393, 1526294393),
	('/log-error/index', 2, NULL, NULL, NULL, 1526294393, 1526294393),
	('/log-error/view', 2, NULL, NULL, NULL, 1526294393, 1526294393),
	('/mulai-interview/*', 2, NULL, NULL, NULL, 1530746044, 1530746044),
	('/mulai-interview/create', 2, NULL, NULL, NULL, 1530746044, 1530746044),
	('/mulai-interview/view', 2, NULL, NULL, NULL, 1530746044, 1530746044),
	('/profile/*', 2, NULL, NULL, NULL, 1521567615, 1521567615),
	('/profile/captcha', 2, NULL, NULL, NULL, 1521567614, 1521567614),
	('/profile/change-password', 2, NULL, NULL, NULL, 1521567615, 1521567615),
	('/profile/change-theme', 2, NULL, NULL, NULL, 1521567615, 1521567615),
	('/profile/error', 2, NULL, NULL, NULL, 1521567614, 1521567614),
	('/profile/index', 2, NULL, NULL, NULL, 1521567615, 1521567615),
	('/site/*', 2, NULL, NULL, NULL, 1521567615, 1521567615),
	('/site/about', 2, NULL, NULL, NULL, 1521567615, 1521567615),
	('/site/captcha', 2, NULL, NULL, NULL, 1521567615, 1521567615),
	('/site/contact', 2, NULL, NULL, NULL, 1521567615, 1521567615),
	('/site/error', 2, NULL, NULL, NULL, 1521567615, 1521567615),
	('/site/index', 2, NULL, NULL, NULL, 1521567615, 1521567615),
	('/site/lang', 2, NULL, NULL, NULL, 1521567615, 1521567615),
	('/site/login', 2, NULL, NULL, NULL, 1521567615, 1521567615),
	('/site/logout', 2, NULL, NULL, NULL, 1521567615, 1521567615),
	('/user-calon/*', 2, NULL, NULL, NULL, 1530624201, 1530624201),
	('/user-calon/create', 2, NULL, NULL, NULL, 1530624201, 1530624201),
	('/user-calon/delete', 2, NULL, NULL, NULL, 1530624201, 1530624201),
	('/user-calon/delete-items', 2, NULL, NULL, NULL, 1530624201, 1530624201),
	('/user-calon/download-cv', 2, NULL, NULL, NULL, 1531411474, 1531411474),
	('/user-calon/index', 2, NULL, NULL, NULL, 1530624201, 1530624201),
	('/user-calon/update', 2, NULL, NULL, NULL, 1530624201, 1530624201),
	('/user-calon/view', 2, NULL, NULL, NULL, 1530624201, 1530624201),
	('/user-interviewer/*', 2, NULL, NULL, NULL, 1530624201, 1530624201),
	('/user-interviewer/create', 2, NULL, NULL, NULL, 1530624201, 1530624201),
	('/user-interviewer/delete', 2, NULL, NULL, NULL, 1530624201, 1530624201),
	('/user-interviewer/delete-items', 2, NULL, NULL, NULL, 1530624201, 1530624201),
	('/user-interviewer/index', 2, NULL, NULL, NULL, 1530624201, 1530624201),
	('/user-interviewer/update', 2, NULL, NULL, NULL, 1530624201, 1530624201),
	('/user-interviewer/view', 2, NULL, NULL, NULL, 1530624201, 1530624201),
	('/userManagement/*', 2, NULL, NULL, NULL, 1521567611, 1521567611),
	('/userManagement/default/*', 2, NULL, NULL, NULL, 1521567611, 1521567611),
	('/userManagement/default/change-password', 2, NULL, NULL, NULL, 1521567611, 1521567611),
	('/userManagement/default/create', 2, NULL, NULL, NULL, 1521567610, 1521567610),
	('/userManagement/default/delete', 2, NULL, NULL, NULL, 1521567611, 1521567611),
	('/userManagement/default/index', 2, NULL, NULL, NULL, 1521567610, 1521567610),
	('/userManagement/default/open-banned', 2, NULL, NULL, NULL, 1521567611, 1521567611),
	('/userManagement/default/update', 2, NULL, NULL, NULL, 1521567610, 1521567610),
	('/userManagement/default/view', 2, NULL, NULL, NULL, 1521567610, 1521567610),
	('Administrator', 1, NULL, NULL, NULL, 1505395874, 1515924499),
	('Basic Access', 2, 'Akses Beranda, update profile, logout', NULL, NULL, 1530554361, 1530554361),
	('Data Master', 2, 'Administraor and Super User Only', NULL, NULL, 1530554385, 1530635117),
	('Interviewer', 1, NULL, NULL, NULL, 1525951080, 1530635576),
	('Interviewer -  Jadwal Wawancara', 2, NULL, NULL, NULL, 1530640095, 1530640153),
	('Interviewer - Data Calon', 2, 'wihtout route delete, create & update', NULL, NULL, 1530624375, 1530635347),
	('Interviewer - Hasil Wawancara', 2, NULL, NULL, NULL, 1530716940, 1530716940),
	('Jadwal Wawancara Full Akses', 2, NULL, NULL, NULL, 1530640186, 1530640186),
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

-- Dumping data for table yarsi_ibnu.auth_item_child: ~27 rows (approximately)
/*!40000 ALTER TABLE `auth_item_child` DISABLE KEYS */;
INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
	('Super User', '/*'),
	('Data Master', '/aspek-penilaian-tipe/*'),
	('Data Master', '/aspek-penilaian/*'),
	('Data Master', '/fakultas-unit/*'),
	('Administrator', '/formulir/index'),
	('Interviewer - Hasil Wawancara', '/formulir/index'),
	('Interviewer', '/formulir/keputusan-interviewer'),
	('Administrator', '/formulir/view'),
	('Interviewer - Hasil Wawancara', '/formulir/view'),
	('Data Master', '/jabatan/*'),
	('Administrator', '/jadwal-wawancara/*'),
	('Jadwal Wawancara Full Akses', '/jadwal-wawancara/*'),
	('Interviewer -  Jadwal Wawancara', '/jadwal-wawancara/index'),
	('Interviewer', '/jadwal-wawancara/view'),
	('Interviewer -  Jadwal Wawancara', '/jadwal-wawancara/view'),
	('Data Master', '/keputusan-tipe/*'),
	('Interviewer', '/mulai-interview/*'),
	('Basic Access', '/profile/*'),
	('Basic Access', '/site/*'),
	('Administrator', '/user-calon/*'),
	('Interviewer - Data Calon', '/user-calon/download-cv'),
	('Interviewer - Data Calon', '/user-calon/index'),
	('Interviewer - Data Calon', '/user-calon/view'),
	('Administrator', '/user-interviewer/*'),
	('Administrator', 'Basic Access'),
	('Interviewer', 'Basic Access'),
	('Administrator', 'Data Master'),
	('Interviewer', 'Interviewer - Hasil Wawancara');
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table yarsi_ibnu.fakultas_unit: ~2 rows (approximately)
/*!40000 ALTER TABLE `fakultas_unit` DISABLE KEYS */;
INSERT INTO `fakultas_unit` (`id`, `nama`, `is_active`) VALUES
	(1, 'Fakultas Teknik', 1),
	(2, 'Fakultas Kedokteran & Kesehatan', 1);
/*!40000 ALTER TABLE `fakultas_unit` ENABLE KEYS */;

-- Dumping structure for table yarsi_ibnu.formulir
CREATE TABLE IF NOT EXISTS `formulir` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `calon_id` int(11) NOT NULL,
  `interviewer_id` int(11) NOT NULL,
  `tanggal_wawancara` date NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table yarsi_ibnu.formulir: ~1 rows (approximately)
/*!40000 ALTER TABLE `formulir` DISABLE KEYS */;
INSERT INTO `formulir` (`id`, `calon_id`, `interviewer_id`, `tanggal_wawancara`, `catatan`, `keputusan_id`, `keputusan_interviewer`, `nilai`, `timestamp`) VALUES
	(50, 1, 4, '2018-07-10', 'Tester\r\nasdasdas\r\nasdasd\r\nada\r\ndsa\r\nda\r\n', 1, 2, 132, '2018-07-12 23:29:04');
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table yarsi_ibnu.formulir_kompetensi_posisi: ~3 rows (approximately)
/*!40000 ALTER TABLE `formulir_kompetensi_posisi` DISABLE KEYS */;
INSERT INTO `formulir_kompetensi_posisi` (`id`, `formulir_id`, `aspek_penilaian`, `kriteria_penilaian`) VALUES
	(131, 50, ' (Harap user menuliskan beberapa kompetensi untuk posisi ini - bisa mengacu pada jon deskripsi)', 5),
	(132, 50, ' (Harap user menuliskan beberapa kompetensi untuk posisi ini - bisa mengacu pada jon deskripsi)', 5),
	(133, 50, '', NULL);
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table yarsi_ibnu.formulir_kriteria_penilaian: ~21 rows (approximately)
/*!40000 ALTER TABLE `formulir_kriteria_penilaian` DISABLE KEYS */;
INSERT INTO `formulir_kriteria_penilaian` (`id`, `formulir_id`, `aspek_penilaian_id`, `kriteria_penilaian`) VALUES
	(1030, 50, 13, 6),
	(1031, 50, 14, 5),
	(1032, 50, 15, 6),
	(1033, 50, 16, 7),
	(1034, 50, 17, 6),
	(1035, 50, 18, 5),
	(1036, 50, 19, 4),
	(1037, 50, 20, 6),
	(1038, 50, 21, 4),
	(1039, 50, 1, 7),
	(1040, 50, 2, 6),
	(1041, 50, 3, 7),
	(1042, 50, 4, 7),
	(1043, 50, 5, 6),
	(1044, 50, 6, 7),
	(1045, 50, 7, 6),
	(1046, 50, 8, 5),
	(1047, 50, 9, 6),
	(1048, 50, 10, 7),
	(1049, 50, 11, 7),
	(1050, 50, 12, 7);
/*!40000 ALTER TABLE `formulir_kriteria_penilaian` ENABLE KEYS */;

-- Dumping structure for table yarsi_ibnu.jabatan
CREATE TABLE IF NOT EXISTS `jabatan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1. Active, 2. Non Active',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table yarsi_ibnu.jabatan: ~2 rows (approximately)
/*!40000 ALTER TABLE `jabatan` DISABLE KEYS */;
INSERT INTO `jabatan` (`id`, `nama`, `is_active`) VALUES
	(1, 'HRD', 1),
	(2, 'Staf HRD', 1);
/*!40000 ALTER TABLE `jabatan` ENABLE KEYS */;

-- Dumping structure for table yarsi_ibnu.jadwal_wawancara
CREATE TABLE IF NOT EXISTS `jadwal_wawancara` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `user_calon_id` int(11) NOT NULL,
  `user_interviewer_id` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '2' COMMENT '1. Sudah di Interview, 2. Belum di Interview',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `user_calon_id` (`user_calon_id`),
  KEY `user_interviewer_id` (`user_interviewer_id`),
  CONSTRAINT `FK_jadwal_wawancara_user_calon` FOREIGN KEY (`user_calon_id`) REFERENCES `user_calon` (`id`),
  CONSTRAINT `FK_jadwal_wawancara_user_interviewer` FOREIGN KEY (`user_interviewer_id`) REFERENCES `user_interviewer` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table yarsi_ibnu.jadwal_wawancara: ~2 rows (approximately)
/*!40000 ALTER TABLE `jadwal_wawancara` DISABLE KEYS */;
INSERT INTO `jadwal_wawancara` (`id`, `tanggal`, `user_calon_id`, `user_interviewer_id`, `status`, `timestamp`) VALUES
	(4, '2018-07-10', 1, 4, 1, '2018-07-12 23:29:04'),
	(7, '2018-07-12', 1, 5, 2, '2018-07-12 21:44:33');
/*!40000 ALTER TABLE `jadwal_wawancara` ENABLE KEYS */;

-- Dumping structure for table yarsi_ibnu.keputusan_tipe
CREATE TABLE IF NOT EXISTS `keputusan_tipe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `range_nilai_1` float NOT NULL,
  `range_nilai_2` float NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1. Active, 2. Non Active',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table yarsi_ibnu.keputusan_tipe: ~3 rows (approximately)
/*!40000 ALTER TABLE `keputusan_tipe` DISABLE KEYS */;
INSERT INTO `keputusan_tipe` (`id`, `nama`, `range_nilai_1`, `range_nilai_2`, `is_active`) VALUES
	(1, 'Disarankan', 108.33, 161, 1),
	(2, 'Dipertimbangkan', 53.68, 107.33, 1),
	(3, 'Ditolak', 0, 52.68, 1);
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table yarsi_ibnu.menu: ~12 rows (approximately)
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` (`id`, `name`, `parent`, `route`, `order`, `data`) VALUES
	(1, 'Beranda', NULL, '/site/index', 0, _binary 0x66612D75736572),
	(6, 'Pengaturan', NULL, NULL, 9, NULL),
	(8, 'Configuration', 6, '/admin/assignment/index', 1, NULL),
	(90, 'Log Error', 6, '/log-error/index', 0, NULL),
	(92, 'Data Master', NULL, NULL, 8, NULL),
	(93, 'Aspek Penilaian', 92, '/aspek-penilaian/index', NULL, NULL),
	(94, 'Aspek Penilaian Tipe', 92, '/aspek-penilaian-tipe/index', 2, NULL),
	(95, 'Fakultas Unit', 92, '/fakultas-unit/index', 3, NULL),
	(96, 'Jabatan', 92, '/jabatan/index', 4, NULL),
	(97, 'Keputusan', 92, '/keputusan-tipe/index', 5, NULL),
	(98, 'Data Calon', NULL, '/user-calon/index', 3, NULL),
	(99, 'Data Interviewer', NULL, '/user-interviewer/index', 4, NULL),
	(101, 'Hasil Wawancara', NULL, '/formulir/index', 2, NULL),
	(102, 'Jadwal Wawancara', NULL, '/jadwal-wawancara/index', 1, NULL);
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table yarsi_ibnu.user: ~3 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `password_default`, `email`, `status`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
	(1, 'superuser', NULL, '$2y$13$IpMBKpF85EKNA/Pxqk06H.BjjOaPz/.Ol1e.PJfGYWIJoOOI0YSFO', NULL, NULL, 'superuser@gmail.com', 10, 1509549909, 1526294085, 1, 1),
	(10, 'hifahrul@gmail.com', NULL, '$2y$13$KeIkMqRwzMdmQ8tbqiF3/OvSdNRZ6TL1yHskXRpH2fWhCU9TkS8kG', NULL, 'udhvqz', 'hifahrul@gmail.com', 10, 1530634470, 1530814252, NULL, NULL),
	(15, 'haifahrul@gmail.com', NULL, '$2y$13$5pggSC8nxoAbC4y9LSzo3uw2Q83SkkYW2gVOtjlPzxRD9zWEgjo26', NULL, 'pirzfr', 'haifahrul@gmail.com', 10, 1530636027, 1530636027, NULL, NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

-- Dumping structure for table yarsi_ibnu.user_calon
CREATE TABLE IF NOT EXISTS `user_calon` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `nama_calon` varchar(50) NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table yarsi_ibnu.user_calon: ~2 rows (approximately)
/*!40000 ALTER TABLE `user_calon` DISABLE KEYS */;
INSERT INTO `user_calon` (`id`, `user_id`, `nama_calon`, `usia`, `pendidikan`, `jabatan_yang_dilamar`, `phone`, `email`, `keputusan_id`, `cv`, `cv_extension`, `status`) VALUES
	(1, NULL, 'Ibnu', 24, 'S1 Teknik Informatika', 'Backend Programmer', '085712345678', 'ibnu@gmail.com', NULL, NULL, NULL, 2),
	(2, NULL, 'Kamal', 22, 'S1 FKK', 'DOkter GIGI', '08712312313', 'kamal@gmail.com', NULL, NULL, NULL, 2);
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Dumping data for table yarsi_ibnu.user_interviewer: ~2 rows (approximately)
/*!40000 ALTER TABLE `user_interviewer` DISABLE KEYS */;
INSERT INTO `user_interviewer` (`id`, `user_id`, `nama_pewawancara`, `jabatan_id`, `fakultas_unit_id`, `is_active`) VALUES
	(4, 10, 'Arsini', 2, 2, 1),
	(5, 15, 'Fahrul', 1, 1, 1);
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

-- Dumping data for table yarsi_ibnu.user_profile: ~2 rows (approximately)
/*!40000 ALTER TABLE `user_profile` DISABLE KEYS */;
INSERT INTO `user_profile` (`user_id`, `firstname`, `lastname`, `no_telp`, `avatar`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
	(1, 'AFS', '', '', '8a954ac7fa30824c1b75850d546afe256b4f6078.png', NULL, 1526294044, NULL, 1);
/*!40000 ALTER TABLE `user_profile` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
