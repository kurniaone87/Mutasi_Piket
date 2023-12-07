/*
SQLyog Community v13.2.0 (64 bit)
MySQL - 8.0.30 : Database - polisi
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`polisi` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `polisi`;

/*Table structure for table `setting` */

DROP TABLE IF EXISTS `setting`;

CREATE TABLE `setting` (
  `id_setting` int NOT NULL AUTO_INCREMENT,
  `perwira_penanggung_jawab` varchar(1024) DEFAULT NULL,
  `pangkat_pj` varchar(1024) DEFAULT NULL,
  `nrp_pj` int DEFAULT NULL,
  `status_pj` smallint DEFAULT NULL,
  PRIMARY KEY (`id_setting`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `setting` */

/*Table structure for table `tb_barang` */

DROP TABLE IF EXISTS `tb_barang`;

CREATE TABLE `tb_barang` (
  `id_barang` int NOT NULL AUTO_INCREMENT,
  `nama_barang` varchar(1024) DEFAULT NULL,
  `jml_barang` varchar(1024) DEFAULT NULL,
  `status_brg` smallint DEFAULT NULL,
  PRIMARY KEY (`id_barang`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tb_barang` */

insert  into `tb_barang`(`id_barang`,`nama_barang`,`jml_barang`,`status_brg`) values 
(1,'PC Axioo','3',1),
(2,'Speaker Active','2',1),
(3,'Monitor CCTV','5',1);

/*Table structure for table `tb_detil_mutasi_barang` */

DROP TABLE IF EXISTS `tb_detil_mutasi_barang`;

CREATE TABLE `tb_detil_mutasi_barang` (
  `id_mutasi_jaga` int NOT NULL,
  `id_barang` int NOT NULL,
  `kelengkapan` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `keterangan` text,
  PRIMARY KEY (`id_mutasi_jaga`,`id_barang`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tb_detil_mutasi_barang` */

insert  into `tb_detil_mutasi_barang`(`id_mutasi_jaga`,`id_barang`,`kelengkapan`,`keterangan`) values 
(1,1,'Lengkap','-'),
(1,2,'Lengkap','-'),
(5,3,'Lengkap','-'),
(9,1,'Lengkap','-'),
(9,2,'Tidak Lengkap','satu barang diperbaiki'),
(9,3,'Lengkap',''),
(10,1,'Lengkap','');

/*Table structure for table `tb_detil_mutasi_personil` */

DROP TABLE IF EXISTS `tb_detil_mutasi_personil`;

CREATE TABLE `tb_detil_mutasi_personil` (
  `id_mutasi_jaga` int NOT NULL,
  `id_personil` int NOT NULL,
  PRIMARY KEY (`id_mutasi_jaga`,`id_personil`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tb_detil_mutasi_personil` */

insert  into `tb_detil_mutasi_personil`(`id_mutasi_jaga`,`id_personil`) values 
(1,1),
(1,2),
(9,1),
(9,2);

/*Table structure for table `tb_list_mutasi` */

DROP TABLE IF EXISTS `tb_list_mutasi`;

CREATE TABLE `tb_list_mutasi` (
  `id_list_mutasi` int NOT NULL AUTO_INCREMENT,
  `id_mutasi_jaga` int DEFAULT NULL,
  `waktu_mutasi` time DEFAULT NULL,
  `keterangan_mutasi` varchar(1024) DEFAULT NULL,
  PRIMARY KEY (`id_list_mutasi`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tb_list_mutasi` */

insert  into `tb_list_mutasi`(`id_list_mutasi`,`id_mutasi_jaga`,`waktu_mutasi`,`keterangan_mutasi`) values 
(1,1,'08:00:00','Serah terima petugas piket jaga lama ke petugas jaga baru selama 1x24 jam dalam keadaan aman'),
(2,1,'09:00:00','Personil melaksanakan stand by dari Command Center'),
(3,9,'11:43:00','Serah terima barang HT');

/*Table structure for table `tb_mutasi_jaga` */

DROP TABLE IF EXISTS `tb_mutasi_jaga`;

CREATE TABLE `tb_mutasi_jaga` (
  `id_mutasi_jaga` int NOT NULL AUTO_INCREMENT,
  `id_user` int DEFAULT NULL,
  `tgl_mutasi` datetime DEFAULT NULL,
  `analisis` text,
  `evaluasi` text,
  `status_mutasi` smallint DEFAULT NULL,
  PRIMARY KEY (`id_mutasi_jaga`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tb_mutasi_jaga` */

insert  into `tb_mutasi_jaga`(`id_mutasi_jaga`,`id_user`,`tgl_mutasi`,`analisis`,`evaluasi`,`status_mutasi`) values 
(1,1,'2023-12-04 00:00:00','Pintu otomatis tidak berfungsi dengan baik\r\nSalah satu kran air washtafel rusak. Washtafel bocor dan pintu washtafel rusak.','Sudah dilakukan koordinasi dengan vendor untuk memperbaiki kerusakan.',1),
(5,1,'2023-12-04 14:36:13','disini analisa','disini evaluasi',1),
(6,1,'2023-12-04 16:48:12','1','2',1),
(7,1,'2023-12-04 16:48:52','22','22',1),
(8,1,'2023-12-04 16:59:09','rrr','rrrr',1),
(9,1,'2023-12-06 02:23:40','joss','joss',1),
(10,1,'2023-12-06 06:12:28','','',0);

/*Table structure for table `tb_personil` */

DROP TABLE IF EXISTS `tb_personil`;

CREATE TABLE `tb_personil` (
  `id_personil` int NOT NULL AUTO_INCREMENT,
  `nama_personil` varchar(1024) DEFAULT NULL,
  `pangkat_personil` varchar(1024) DEFAULT NULL,
  `nrp_personil` int DEFAULT NULL,
  `status_personil` smallint DEFAULT NULL,
  PRIMARY KEY (`id_personil`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tb_personil` */

insert  into `tb_personil`(`id_personil`,`nama_personil`,`pangkat_personil`,`nrp_personil`,`status_personil`) values 
(1,'Anton Sulistyo','Briptu',7875645,1),
(2,'Budi Santosa','Briptu',3457851,1);

/*Table structure for table `tb_user` */

DROP TABLE IF EXISTS `tb_user`;

CREATE TABLE `tb_user` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `id_personil` int DEFAULT NULL,
  `username` varchar(1024) DEFAULT NULL,
  `password` varchar(1024) DEFAULT NULL,
  `level` varchar(1024) DEFAULT NULL,
  `status_user` smallint DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

/*Data for the table `tb_user` */

insert  into `tb_user`(`id_user`,`id_personil`,`username`,`password`,`level`,`status_user`) values 
(1,1,'username','password','admin',1),
(5,2,'user','pass','petugas',1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
