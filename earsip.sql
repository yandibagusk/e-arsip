/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 10.4.14-MariaDB : Database - earsip
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`earsip` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `earsip`;

/*Table structure for table `agenda` */

DROP TABLE IF EXISTS `agenda`;

CREATE TABLE `agenda` (
  `id_agenda` varchar(10) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `waktu` varchar(10) DEFAULT NULL,
  `tempat` varchar(20) DEFAULT NULL,
  `keterangan` longtext DEFAULT NULL,
  `spj` varchar(5) DEFAULT '0',
  PRIMARY KEY (`id_agenda`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `agenda` */

insert  into `agenda`(`id_agenda`,`tanggal`,`waktu`,`tempat`,`keterangan`,`spj`) values 
('AG001','2020-07-09','08.00 WIB','SMK N 1 Depok','Rapat Forkompimka Bulan April 20201','1'),
('AG003','2020-04-28','11.00 WIB','Hotel Satoria','Rapat Pelaksanaan Operasi KITAS dengan Imigrasi','1');

/*Table structure for table `suratkeluar` */

DROP TABLE IF EXISTS `suratkeluar`;

CREATE TABLE `suratkeluar` (
  `id_surat` varchar(10) NOT NULL,
  `nomor` varchar(50) DEFAULT NULL,
  `jenis` varchar(30) DEFAULT NULL,
  `tanggal` varchar(30) DEFAULT NULL,
  `perihal` text DEFAULT NULL,
  `tgl_cetak` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id_surat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `suratkeluar` */

insert  into `suratkeluar`(`id_surat`,`nomor`,`jenis`,`tanggal`,`perihal`,`tgl_cetak`) values 
('SK001','001/DPK/TRTB/212','Undangan','2020-03-06','Forkompimka Bulan Juni','2020-03-06 06:31:41'),
('SK002','212/TRTB/2021','Memo','2020-04-30','Undangan Forkompimka Bulan Mei','2020-04-26 14:32:10');

/*Table structure for table `suratmasuk` */

DROP TABLE IF EXISTS `suratmasuk`;

CREATE TABLE `suratmasuk` (
  `id_surat` varchar(10) NOT NULL,
  `nomor` varchar(30) DEFAULT NULL,
  `jenis` varchar(30) DEFAULT NULL,
  `asal` varchar(40) DEFAULT NULL,
  `perihal` text DEFAULT NULL,
  PRIMARY KEY (`id_surat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `suratmasuk` */

insert  into `suratmasuk`(`id_surat`,`nomor`,`jenis`,`asal`,`perihal`) values 
('SM001','201/SLM/JOG/2020','Undangan','Dinas Sosial','Peresmian Gedung Baru Dinas Sosial');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id_user` varchar(10) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL,
  `hak_akses` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`id_user`,`nama`,`email`,`username`,`password`,`hak_akses`) values 
('U001','Yandi Bagus Kurniawan','yandibagusk@gmail.com','admin','admin','Admin');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
