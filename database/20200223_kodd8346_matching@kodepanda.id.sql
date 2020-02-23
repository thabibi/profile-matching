# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: kodepanda.id (MySQL 5.5.5-10.1.44-MariaDB-cll-lve)
# Database: kodd8346_matching
# Generation Time: 2020-02-23 11:54:10 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table ak_data_bobot
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ak_data_bobot`;

CREATE TABLE `ak_data_bobot` (
  `bobot_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `bobot_selisih` int(11) NOT NULL DEFAULT '0',
  `bobot_nilai` decimal(10,1) NOT NULL DEFAULT '0.0',
  `bobot_keterangan` varchar(100) DEFAULT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `deleted` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`bobot_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `ak_data_bobot` WRITE;
/*!40000 ALTER TABLE `ak_data_bobot` DISABLE KEYS */;

INSERT INTO `ak_data_bobot` (`bobot_id`, `bobot_selisih`, `bobot_nilai`, `bobot_keterangan`, `created_by`, `created_date`, `updated_by`, `updated_date`, `deleted`)
VALUES
	(1,0,5.0,'Tidak ada selisih','SUPPORT','2020-02-20 22:16:35',NULL,NULL,0),
	(2,1,4.5,'Kelebihan 1 tingkat/level','SUPPORT','2020-02-20 22:16:53',NULL,NULL,0),
	(3,-1,4.0,'kekurangan 1 tingkat/level','SUPPORT','2020-02-20 22:17:22',NULL,NULL,0),
	(4,2,3.5,'kelebihan 2 tingkat/level','SUPPORT','2020-02-20 22:17:35',NULL,NULL,0),
	(5,-2,3.0,'kekurangan 2 tingkat/level','SUPPORT','2020-02-20 22:17:51',NULL,NULL,0),
	(6,3,2.5,'kelebihan 3 tingkat/level','SUPPORT','2020-02-20 22:18:05',NULL,NULL,0),
	(7,-3,2.0,'kekurangan 3 tingkat/level','SUPPORT','2020-02-20 22:18:20',NULL,NULL,0),
	(8,4,1.5,'kelebihan 4 tingkat/level','SUPPORT','2020-02-20 22:18:40',NULL,NULL,0),
	(9,-4,1.0,'kekurangan 4 tingkat/level','SUPPORT','2020-02-20 22:18:54',NULL,NULL,0);

/*!40000 ALTER TABLE `ak_data_bobot` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ak_data_kriteria
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ak_data_kriteria`;

CREATE TABLE `ak_data_kriteria` (
  `kriteria_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `project_id` bigint(20) NOT NULL,
  `kriteria_nama` varchar(100) NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `deleted` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`kriteria_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `ak_data_kriteria` WRITE;
/*!40000 ALTER TABLE `ak_data_kriteria` DISABLE KEYS */;

INSERT INTO `ak_data_kriteria` (`kriteria_id`, `project_id`, `kriteria_nama`, `created_by`, `created_date`, `updated_by`, `updated_date`, `deleted`)
VALUES
	(1,1,'Akademik','SUPPORT','2020-02-20 21:47:41',NULL,NULL,0),
	(2,1,'Non Akademik','SUPPORT','2020-02-20 21:47:52',NULL,NULL,0);

/*!40000 ALTER TABLE `ak_data_kriteria` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ak_data_project
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ak_data_project`;

CREATE TABLE `ak_data_project` (
  `project_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `project_nama` varchar(100) NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `deleted` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`project_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `ak_data_project` WRITE;
/*!40000 ALTER TABLE `ak_data_project` DISABLE KEYS */;

INSERT INTO `ak_data_project` (`project_id`, `project_nama`, `created_by`, `created_date`, `updated_by`, `updated_date`, `deleted`)
VALUES
	(1,'REKOMEDASI KULIAH/KERJA/WIRASWASTA','SUPPORT','2020-02-20 21:47:17',NULL,NULL,0);

/*!40000 ALTER TABLE `ak_data_project` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ak_data_rekomendasi
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ak_data_rekomendasi`;

CREATE TABLE `ak_data_rekomendasi` (
  `rekomendasi_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `rekomendasi_kode` varchar(100) DEFAULT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `deleted` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`rekomendasi_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `ak_data_rekomendasi` WRITE;
/*!40000 ALTER TABLE `ak_data_rekomendasi` DISABLE KEYS */;

INSERT INTO `ak_data_rekomendasi` (`rekomendasi_id`, `rekomendasi_kode`, `created_by`, `created_date`, `updated_by`, `updated_date`, `deleted`)
VALUES
	(1,'Kuliah','SUPPORT','2020-02-20 21:50:48',NULL,NULL,0),
	(2,'Kerja','SUPPORT','2020-02-20 21:50:54',NULL,NULL,0),
	(3,'Wiraswasta','SUPPORT','2020-02-20 21:51:00',NULL,NULL,0);

/*!40000 ALTER TABLE `ak_data_rekomendasi` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ak_data_rekomendasi_nilai
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ak_data_rekomendasi_nilai`;

CREATE TABLE `ak_data_rekomendasi_nilai` (
  `rekomendasi_nilai_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `kriteria_id` bigint(20) NOT NULL,
  `subkriteria_id` bigint(20) NOT NULL,
  `rekomendasi_id` bigint(20) NOT NULL,
  `rekomendasi_nilai_bobot` decimal(10,2) NOT NULL DEFAULT '0.00',
  `created_by` varchar(100) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `deleted` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`rekomendasi_nilai_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `ak_data_rekomendasi_nilai` WRITE;
/*!40000 ALTER TABLE `ak_data_rekomendasi_nilai` DISABLE KEYS */;

INSERT INTO `ak_data_rekomendasi_nilai` (`rekomendasi_nilai_id`, `kriteria_id`, `subkriteria_id`, `rekomendasi_id`, `rekomendasi_nilai_bobot`, `created_by`, `created_date`, `updated_by`, `updated_date`, `deleted`)
VALUES
	(1,1,1,1,7.00,'SUPPORT','2020-02-20 21:51:14','SUPPORT','2020-02-20 21:57:27',0),
	(2,1,2,1,8.00,'SUPPORT','2020-02-20 21:57:42',NULL,NULL,0),
	(3,1,3,1,7.00,'SUPPORT','2020-02-20 21:57:55',NULL,NULL,0),
	(4,1,4,1,8.00,'SUPPORT','2020-02-20 21:58:05',NULL,NULL,0),
	(5,1,5,1,9.00,'SUPPORT','2020-02-20 21:58:16',NULL,NULL,0),
	(6,1,6,1,8.00,'SUPPORT','2020-02-20 21:58:25',NULL,NULL,0),
	(7,1,1,2,8.00,'SUPPORT','2020-02-20 21:58:38',NULL,NULL,0),
	(8,1,2,2,7.00,'SUPPORT','2020-02-20 21:58:48',NULL,NULL,0),
	(9,1,3,2,9.00,'SUPPORT','2020-02-20 21:59:02','SUPPORT','2020-02-20 21:59:14',0),
	(10,1,4,2,7.00,'SUPPORT','2020-02-20 21:59:26',NULL,NULL,0),
	(11,1,5,2,6.00,'SUPPORT','2020-02-20 21:59:40',NULL,NULL,0),
	(12,1,6,2,7.00,'SUPPORT','2020-02-20 21:59:53',NULL,NULL,0),
	(13,1,1,3,8.00,'SUPPORT','2020-02-20 22:09:51',NULL,NULL,0),
	(14,1,2,3,9.00,'SUPPORT','2020-02-20 22:11:19',NULL,NULL,0),
	(15,1,3,3,7.00,'SUPPORT','2020-02-20 22:11:30',NULL,NULL,0),
	(16,1,4,3,6.00,'SUPPORT','2020-02-20 22:12:02',NULL,NULL,0),
	(17,1,5,3,8.00,'SUPPORT','2020-02-20 22:12:11',NULL,NULL,0),
	(18,1,6,3,8.00,'SUPPORT','2020-02-20 22:12:20',NULL,NULL,0),
	(19,2,7,1,7.00,'SUPPORT','2020-02-20 22:12:59',NULL,NULL,0),
	(20,2,8,1,6.00,'SUPPORT','2020-02-20 22:13:17',NULL,NULL,0),
	(21,2,9,1,8.00,'SUPPORT','2020-02-20 22:13:32',NULL,NULL,0),
	(22,2,10,1,7.00,'SUPPORT','2020-02-20 22:13:43',NULL,NULL,0),
	(23,2,7,2,8.00,'SUPPORT','2020-02-20 22:13:56',NULL,NULL,0),
	(24,2,8,2,8.00,'SUPPORT','2020-02-20 22:14:11',NULL,NULL,0),
	(25,2,9,2,7.00,'SUPPORT','2020-02-20 22:14:20',NULL,NULL,0),
	(26,2,10,2,6.00,'SUPPORT','2020-02-20 22:14:28',NULL,NULL,0),
	(27,2,7,1,6.00,'SUPPORT','2020-02-20 22:14:37','SUPPORT','2020-02-20 22:15:33',1),
	(28,2,8,3,7.00,'SUPPORT','2020-02-20 22:14:48',NULL,NULL,0),
	(29,2,9,3,8.00,'SUPPORT','2020-02-20 22:14:56',NULL,NULL,0),
	(30,2,10,3,7.00,'SUPPORT','2020-02-20 22:15:04',NULL,NULL,0),
	(31,2,7,3,6.00,'SUPPORT','2020-02-20 22:16:03',NULL,NULL,0);

/*!40000 ALTER TABLE `ak_data_rekomendasi_nilai` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ak_data_siswa_nilai
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ak_data_siswa_nilai`;

CREATE TABLE `ak_data_siswa_nilai` (
  `nilai_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `subkriteria_id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `siswa_nilai` int(11) NOT NULL DEFAULT '0',
  `created_by` varchar(100) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `deleted` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`nilai_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `ak_data_siswa_nilai` WRITE;
/*!40000 ALTER TABLE `ak_data_siswa_nilai` DISABLE KEYS */;

INSERT INTO `ak_data_siswa_nilai` (`nilai_id`, `subkriteria_id`, `user_id`, `siswa_nilai`, `created_by`, `created_date`, `updated_by`, `updated_date`, `deleted`)
VALUES
	(1,1,4,8,'SUPPORT','2020-02-21 00:22:53',NULL,NULL,0),
	(2,2,4,7,'SUPPORT','2020-02-21 00:23:04',NULL,NULL,0),
	(3,3,4,9,'SUPPORT','2020-02-21 00:23:10',NULL,NULL,0),
	(4,4,4,7,'SUPPORT','2020-02-21 00:23:19',NULL,NULL,0),
	(5,5,4,7,'SUPPORT','2020-02-21 00:23:27',NULL,NULL,0),
	(6,6,4,9,'SUPPORT','2020-02-21 00:23:37',NULL,NULL,0),
	(7,7,4,6,'SUPPORT','2020-02-21 00:23:47',NULL,NULL,0),
	(8,8,4,7,'SUPPORT','2020-02-21 00:23:56',NULL,NULL,0),
	(9,9,4,8,'SUPPORT','2020-02-21 00:24:09',NULL,NULL,0),
	(10,10,4,6,'SUPPORT','2020-02-21 00:24:18',NULL,NULL,0);

/*!40000 ALTER TABLE `ak_data_siswa_nilai` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ak_data_subkriteria
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ak_data_subkriteria`;

CREATE TABLE `ak_data_subkriteria` (
  `subkriteria_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `kriteria_id` bigint(20) NOT NULL,
  `subkriteria_kode` char(20) NOT NULL,
  `subkriteria_nama` varchar(100) NOT NULL,
  `subkriteria_keterangan` enum('Core','Secondary') NOT NULL,
  `created_by` varchar(100) NOT NULL,
  `created_date` datetime NOT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `deleted` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`subkriteria_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `ak_data_subkriteria` WRITE;
/*!40000 ALTER TABLE `ak_data_subkriteria` DISABLE KEYS */;

INSERT INTO `ak_data_subkriteria` (`subkriteria_id`, `kriteria_id`, `subkriteria_kode`, `subkriteria_nama`, `subkriteria_keterangan`, `created_by`, `created_date`, `updated_by`, `updated_date`, `deleted`)
VALUES
	(1,1,'SK-01','Pendidikan Agama','Core','SUPPORT','2020-02-20 21:48:07',NULL,NULL,0),
	(2,1,'SK-02','Bahasa Indonesia','Core','SUPPORT','2020-02-20 21:48:25',NULL,NULL,0),
	(3,1,'SK-03','Bahasa Inggris','Core','SUPPORT','2020-02-20 21:48:41',NULL,NULL,0),
	(4,1,'SK-04','Matematika','Secondary','SUPPORT','2020-02-20 21:48:54',NULL,NULL,0),
	(5,1,'SK-05','Keterampilan','Secondary','SUPPORT','2020-02-20 21:49:12',NULL,NULL,0),
	(6,1,'SK-06','Kejuruan/Produktif','Secondary','SUPPORT','2020-02-20 21:49:27',NULL,NULL,0),
	(7,2,'SK-07','Tes Pengetahuan','Core','SUPPORT','2020-02-20 21:49:42',NULL,NULL,0),
	(8,2,'SK-08','Minat Siswa','Core','SUPPORT','2020-02-20 21:50:03',NULL,NULL,0),
	(9,2,'SK-09','Minat Orang Tua','Secondary','SUPPORT','2020-02-20 21:50:22',NULL,NULL,0),
	(10,2,'SK-10','Catatan Prestasi','Secondary','SUPPORT','2020-02-20 21:50:36',NULL,NULL,0);

/*!40000 ALTER TABLE `ak_data_subkriteria` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ak_data_system_info
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ak_data_system_info`;

CREATE TABLE `ak_data_system_info` (
  `info_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `info_name` varchar(128) NOT NULL DEFAULT '',
  `created_by` varchar(128) NOT NULL DEFAULT 'System',
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` varchar(128) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `deleted` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`info_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `ak_data_system_info` WRITE;
/*!40000 ALTER TABLE `ak_data_system_info` DISABLE KEYS */;

INSERT INTO `ak_data_system_info` (`info_id`, `info_name`, `created_by`, `created_date`, `updated_by`, `updated_date`, `deleted`)
VALUES
	(1,'SPK PROFILE MATCHING','System','2020-01-07 11:23:58',NULL,NULL,0);

/*!40000 ALTER TABLE `ak_data_system_info` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ak_data_system_instansi
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ak_data_system_instansi`;

CREATE TABLE `ak_data_system_instansi` (
  `instansi_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `instansi_logo` varchar(128) DEFAULT NULL,
  `instansi_nama` varchar(128) NOT NULL DEFAULT '',
  `instansi_alamat` text,
  `instansi_alamat_email` varchar(128) DEFAULT NULL,
  `instansi_website` varchar(128) DEFAULT NULL,
  `instansi_kontak` char(25) DEFAULT NULL,
  `created_by` varchar(128) NOT NULL DEFAULT 'System',
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` varchar(128) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `deleted` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`instansi_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `ak_data_system_instansi` WRITE;
/*!40000 ALTER TABLE `ak_data_system_instansi` DISABLE KEYS */;

INSERT INTO `ak_data_system_instansi` (`instansi_id`, `instansi_logo`, `instansi_nama`, `instansi_alamat`, `instansi_alamat_email`, `instansi_website`, `instansi_kontak`, `created_by`, `created_date`, `updated_by`, `updated_date`, `deleted`)
VALUES
	(1,NULL,'AFIAH SHOLIHAH','Jl. Jatimeta Gn. Jati No. 1 Cirebon',NULL,NULL,'02318339210','System','2020-01-09 12:21:43',NULL,NULL,0);

/*!40000 ALTER TABLE `ak_data_system_instansi` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ak_data_system_level
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ak_data_system_level`;

CREATE TABLE `ak_data_system_level` (
  `level_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `level_nama` varchar(128) NOT NULL DEFAULT '',
  `created_by` varchar(128) NOT NULL DEFAULT 'System',
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` varchar(128) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`level_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `ak_data_system_level` WRITE;
/*!40000 ALTER TABLE `ak_data_system_level` DISABLE KEYS */;

INSERT INTO `ak_data_system_level` (`level_id`, `level_nama`, `created_by`, `created_date`, `updated_by`, `updated_date`, `deleted`)
VALUES
	(1,'Master','System','2020-01-30 01:46:34',NULL,NULL,0),
	(2,'Admin','System','2020-01-30 01:46:41',NULL,NULL,0),
	(3,'BK','System','2020-01-30 01:46:48',NULL,NULL,0),
	(4,'Siswa','System','2020-01-30 01:46:56',NULL,NULL,0);

/*!40000 ALTER TABLE `ak_data_system_level` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ak_data_system_log
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ak_data_system_log`;

CREATE TABLE `ak_data_system_log` (
  `id` varchar(128) NOT NULL DEFAULT '',
  `ip_address` varchar(45) NOT NULL DEFAULT '',
  `timestamp` int(10) unsigned NOT NULL,
  `data` blob NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `ak_data_system_log` WRITE;
/*!40000 ALTER TABLE `ak_data_system_log` DISABLE KEYS */;

INSERT INTO `ak_data_system_log` (`id`, `ip_address`, `timestamp`, `data`)
VALUES
	('2b2f84905082c1926b053468abb153ee40940217','36.71.237.92',1582219684,X'5F5F63695F6C6173745F726567656E65726174657C693A313538323231393530343B69647C733A313A2231223B6B6F64657C733A31333A225553522F303132302F30303031223B6E616D617C733A373A22535550504F5254223B6C6576656C7C733A363A224D6173746572223B417070496E666F7C733A32303A2253504B2050524F46494C45204D41544348494E47223B4C6F67676564496E7C623A313B'),
	('96590c404791337a9c5b794e86cf84854663d948','36.71.239.43',1582455043,X'5F5F63695F6C6173745F726567656E65726174657C693A313538323435353032363B'),
	('9e97f2cea193a47a330f3d5a4143b9c14291d07c','36.71.236.241',1582294046,X'5F5F63695F6C6173745F726567656E65726174657C693A313538323239343034353B69647C733A313A2231223B6B6F64657C733A31333A225553522F303132302F30303031223B6E616D617C733A373A22535550504F5254223B6C6576656C7C733A363A224D6173746572223B417070496E666F7C733A32303A2253504B2050524F46494C45204D41544348494E47223B4C6F67676564496E7C623A313B'),
	('db91fb84f3f50139f3b124a2e9575dfb59086659','114.142.173.19',1582294336,X'5F5F63695F6C6173745F726567656E65726174657C693A313538323239343333323B69647C733A313A2232223B6B6F64657C733A31333A225553522F303232302F30303032223B6E616D617C733A353A2241646D696E223B6C6576656C7C733A353A2241646D696E223B417070496E666F7C733A32303A2253504B2050524F46494C45204D41544348494E47223B4C6F67676564496E7C623A313B'),
	('e6a47cdbc2719574b788684eb2a27261804ec1e4','114.142.173.25',1582219918,X'5F5F63695F6C6173745F726567656E65726174657C693A313538323231393638383B69647C733A313A2234223B6B6F64657C733A31333A225553522F303232302F30303034223B6E616D617C733A31343A2241666961682053686F6C69686168223B6C6576656C7C733A353A225369737761223B417070496E666F7C733A32303A2253504B2050524F46494C45204D41544348494E47223B4C6F67676564496E7C623A313B'),
	('fa29c7bdee2e787c17b46664a60624a94652a868','114.142.172.24',1582212990,X'5F5F63695F6C6173745F726567656E65726174657C693A313538323231323937383B69647C733A313A2231223B6B6F64657C733A31333A225553522F303132302F30303031223B6E616D617C733A373A22535550504F5254223B6C6576656C7C733A363A224D6173746572223B417070496E666F7C733A32303A2253504B2050524F46494C45204D41544348494E47223B4C6F67676564496E7C623A313B');

/*!40000 ALTER TABLE `ak_data_system_log` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table ak_data_system_user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ak_data_system_user`;

CREATE TABLE `ak_data_system_user` (
  `user_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `level_id` bigint(20) unsigned NOT NULL DEFAULT '2',
  `user_kode` char(20) NOT NULL,
  `user_nama` varchar(128) NOT NULL DEFAULT '',
  `user_login` varchar(128) NOT NULL DEFAULT '',
  `user_pass` varchar(128) DEFAULT NULL,
  `user_email` varchar(128) DEFAULT NULL,
  `user_jurusan` varchar(100) DEFAULT NULL,
  `user_tahun_angkatan` varchar(100) DEFAULT NULL,
  `user_jenis_kelamin` varchar(100) DEFAULT NULL,
  `user_tempat_lahir` varchar(100) DEFAULT NULL,
  `user_tanggal_lahir` date DEFAULT NULL,
  `user_alamat` varchar(100) DEFAULT NULL,
  `user_nomor_telepon` varchar(100) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `created_by` varchar(128) NOT NULL DEFAULT 'System',
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` varchar(128) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_login` (`user_login`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `ak_data_system_user` WRITE;
/*!40000 ALTER TABLE `ak_data_system_user` DISABLE KEYS */;

INSERT INTO `ak_data_system_user` (`user_id`, `level_id`, `user_kode`, `user_nama`, `user_login`, `user_pass`, `user_email`, `user_jurusan`, `user_tahun_angkatan`, `user_jenis_kelamin`, `user_tempat_lahir`, `user_tanggal_lahir`, `user_alamat`, `user_nomor_telepon`, `last_login`, `created_by`, `created_date`, `updated_by`, `updated_date`, `deleted`)
VALUES
	(1,1,'USR/0120/0001','SUPPORT','support','$2y$10$/5nnBjt3v/UfS4Mfro7jc.Oh8hKA8bevcFKNwlmYhP8hzhL5ffoEO',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-02-21 20:33:07','System','2020-02-16 17:22:58',NULL,NULL,0),
	(2,2,'USR/0220/0002','Admin','admin','$2y$10$nW3UKC5EaVTPgIKOHMckgOdjX6.Ac2Xg4miMpwf1qN/AFXVEGOlAe','tata@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2020-02-21 21:00:27','SUPPORT','2020-02-19 08:30:31','SUPPORT','2020-02-21 20:38:17',0),
	(3,3,'USR/0220/0003','BK','bk','$2y$10$RnWCV5Qmiz80VMY44ZprL.ZxJWUccTxuo0YKxpZR8EDjJdf9/b4ri','bk@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'SUPPORT','2020-02-19 08:31:18',NULL,NULL,0),
	(4,4,'USR/0220/0004','Afiah Sholihah','150511070','$2y$10$QQgXptWnkhXDT/nIIXjN1OZakbzCxGjLodNrosXqAN7KWcne.KXY2','afiah@gmail.com','Teknik Informatika','2020','Wanita','Daegu','2001-04-12','Daegu, Korea Selatan','089648632746','2020-02-21 20:54:39','SUPPORT','2020-02-20 22:22:09','SUPPORT','2020-02-21 20:37:38',0),
	(5,4,'USR/0220/0005','test','150511071','$2y$10$1ym1T0lvaZ0vK6r2RioPvOM8Wt33obON0Ys9sHsiXZfBQ5VycFbsW','pratamapriadi96@gmail.com','123','1','Pria','1','2020-02-01','1','081','2020-02-21 20:54:39','SUPPORT','2020-02-21 20:33:47','SUPPORT','2020-02-21 20:37:43',0);

/*!40000 ALTER TABLE `ak_data_system_user` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
