/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 10.4.25-MariaDB : Database - db_latihanci
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_latihanci` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `db_latihanci`;

/*Table structure for table `tbl_mahasiswa` */

DROP TABLE IF EXISTS `tbl_mahasiswa`;

CREATE TABLE `tbl_mahasiswa` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `nim` varchar(20) DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=114 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_mahasiswa` */

insert  into `tbl_mahasiswa`(`id`,`nim`,`nama`,`alamat`,`no_hp`) values 
(1,'D1A220019','Yon Arifin','Kalijati','08966808986'),
(3,'D1A220078','ucok','subang','08978987680');

/*Table structure for table `tbl_matakuliah` */

DROP TABLE IF EXISTS `tbl_matakuliah`;

CREATE TABLE `tbl_matakuliah` (
  `id_matakuliah` int(5) NOT NULL AUTO_INCREMENT,
  `kode_matakuliah` varchar(50) NOT NULL,
  `nama_matakuliah` varchar(50) DEFAULT NULL,
  `sks` varchar(5) DEFAULT NULL,
  `ruangan` varchar(30) NOT NULL,
  PRIMARY KEY (`id_matakuliah`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbl_matakuliah` */

insert  into `tbl_matakuliah`(`id_matakuliah`,`kode_matakuliah`,`nama_matakuliah`,`sks`,`ruangan`) values 
(2,'D1A001','Jaringan Komputer','3','Lab Komputer 1'),
(3,'D1A002','Pemograman Berorientasi Objek (Framework CI)','3','Lab Komputer 2'),
(4,'D1A003','Pemograman Berorientasi Objek','3','Lab Komputer 1'),
(5,'D1A004','Ilmu Kealaman Dasar','2','Ruang 11');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
