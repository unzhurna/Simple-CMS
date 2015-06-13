/*
SQLyog Community v12.11 (32 bit)
MySQL - 5.6.24 : Database - cms
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`cms` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `cms`;

/*Table structure for table `articles` */

DROP TABLE IF EXISTS `articles`;

CREATE TABLE `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `id_category` int(11) DEFAULT NULL,
  `content` mediumtext,
  `teaser` varchar(300) DEFAULT NULL,
  `tags` varchar(200) DEFAULT NULL,
  `image` varchar(200) DEFAULT NULL,
  `prev_img` varchar(200) DEFAULT NULL,
  `thumb_img` varchar(200) DEFAULT NULL,
  `icon_img` varchar(200) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `published` tinyint(1) DEFAULT '0',
  `deleted` tinyint(1) DEFAULT '0',
  `date_create` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `articles` */

insert  into `articles`(`id`,`title`,`id_category`,`content`,`teaser`,`tags`,`image`,`prev_img`,`thumb_img`,`icon_img`,`id_user`,`published`,`deleted`,`date_create`) values (1,'Anggota DPR Ini Yakini Pembunuh Angeline Tak Hanya Satu Pelaku',3,'<p><strong>JAKARTA, KOMPAS.com</strong>&nbsp;- Anggota Komisi VIII DPR RI Maman Imanul Haq meyakini ada pelaku lain yang terlibat dalam kasus pembunuhan Angeline (8). Ia tidak yakin kasus tersebut hanya melibatkan tersangka tunggal.</p>\r\n<p>Maman menjelaskan, dugaan ada pelaku lain muncul setelah mengamati proses pengungkapan kasus pembunuhan Angeline. Ia curiga atas sikap pihak keluarga asuh dan kepolisian yang dinilainya sangat tertutup dalam proses pengungkapan kasus tersebut.</p>\r\n<p>\"Polisi kenapa menutup? Kenapa menutup pada satu tersangka saja? Padahal masih ada yang perlu didalami,\" kata Maman, dalam sebuah diskusi di Jakarta Pusat, Sabtu (13/6/2015).</p>\r\n<p>Anggota Fraksi PKB itu melanjutkan, kasus pembunuhan Angeline harus menjadi perhatian bersama, khususnya pada peningkatan perlindungan anak. (baca:&nbsp;<a href=\"http://regional.kompas.com/read/2015/06/13/10101731/Publik.Diminta.Percayakan.Polisi.Tuntaskan.Kasus.Angeline\">Publik Diminta Percayakan Polisi Tuntaskan Kasus Angeline</a>)</p>\r\n<p>Ia mengaku akan menyampaikan dorongan dari Komisi VIII DPR agar pemerintah menguatkan peran melindungi anak-anak Indonesia.</p>\r\n<p>\"Ini tragedi kemanusiaan, tamparan besar pada negara kita. Bahwa hari ini tidak ada tempat aman untuk anak-anak,\" ucapnya.</p>\r\n<p>Kepolisian Resor Kota Denpasar sudah menetapkan satu tersangka yang diduga pelaku pembunuhan Angeline, yakni Agus (25), mantan pembantu rumah tangga di kediaman korban.</p>\r\n<p>Kepolisian tengah mengembangkan penyelidikan terkait kasus meninggalnya Angeline. Polisi memeriksa keluarga angkat Angeline, termasuk Margareith, ibu angkat Angeline. (baca:&nbsp;<a href=\"http://regional.kompas.com/read/2015/06/12/20540961/Polisi.Telusuri.Percikan.Darah.di.Kamar.Ibu.Angkat.Angeline\">Polisi Telusuri Percikan Darah di Kamar Ibu Angkat Angeline</a>)</p>\r\n<p>Pusat Pelayanan Terpadu Pemberdayaan Perempuan dan Anak (P2TP2A) telah melaporkan Margareith ke Kepolisian Resor Kota Denpasar berkaitan dengan dugaan penelantaran dan kekerasan terhadap anak. P2TP2A merupakan pendamping hukum Hamidah dan Rosidik, orangtua kandung Angeline.</p>\r\n<hr class=\"orange\" />\r\n<div class=\"kcm-read-bottom-topic mb2\">\r\n<p>&nbsp;</p>\r\n</div>\r\n<div class=\"kcm-read-copy mb2\">\r\n<table class=\"grey\" width=\"400px\">\r\n<tbody>\r\n<tr>\r\n<td width=\"50px\">Penulis</td>\r\n<td>: Indra Akuntono</td>\r\n</tr>\r\n<tr>\r\n<td width=\"50px\">Editor</td>\r\n<td>: Sandro Gatra</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</div>','JAKARTA, KOMPAS.com&nbsp;- Anggota Komisi VIII DPR RI Maman Imanul Haq meyakini ada pelaku lain yang terlibat dalam kasus pembunuhan Angeline&#8230;','',NULL,NULL,NULL,NULL,1,1,0,'2015-06-13 12:02:49');

/*Table structure for table `categories` */

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(75) DEFAULT NULL,
  `description` varchar(75) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `categories` */

insert  into `categories`(`id`,`category`,`description`) values (1,'Properti','Properti'),(2,'Otomotif','Otomotif'),(3,'Hukum','Berita Hukum');

/*Table structure for table `media` */

DROP TABLE IF EXISTS `media`;

CREATE TABLE `media` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `caption` varchar(200) DEFAULT NULL,
  `img_full` varchar(200) DEFAULT NULL,
  `img_preview` varchar(200) DEFAULT NULL,
  `img_thumb` varchar(200) DEFAULT NULL,
  `img_icon` varchar(200) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `media` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `id_group` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`,`username`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2147483647 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`id`,`username`,`name`,`email`,`password`,`phone`,`status`,`id_group`) values (1,'admin','Admininstrator','r.unzhurna@gmail.com','f8701e5e12e11940da9fa9d57d44d8bf','087728723455',1,1),(2147483647,'','Raina Unzhurna','doo_ol@yahoo.com',NULL,NULL,1,2);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
