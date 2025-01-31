-- MySQL dump 10.13  Distrib 8.0.31, for Win64 (x86_64)
--
-- Host: localhost    Database: xbyte
-- ------------------------------------------------------
-- Server version	8.0.31

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `client` (
  `phone` int NOT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `lastname` varchar(20) DEFAULT NULL,
  `address` text,
  PRIMARY KEY (`phone`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `client`
--

LOCK TABLES `client` WRITE;
/*!40000 ALTER TABLE `client` DISABLE KEYS */;
INSERT INTO `client` VALUES (752524255,'Benhocine','lilibenhocine19@gmail.com','Torkia Linda','19 Impasse mokhtar abdelatif alger '),(758456545,'Omeiri','omeiri.abdellah@gmail.com','Abdellah','19 Impasse mokhtar abdelatif alger '),(657271942,'Omeiri','abdouommca@gmail.com','Abdellah','19 Impasse mokhtar abdelatif alger '),(555555555,'Benhocine','lilibenhocine19@gmail.com','Torkia Linda','19 Impasse mokhtar abdelatif alger ');
/*!40000 ALTER TABLE `client` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `coupon`
--

DROP TABLE IF EXISTS `coupon`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `coupon` (
  `coupon_id` int NOT NULL,
  `coupon_code` varchar(50) NOT NULL,
  `dated` date NOT NULL,
  `datef` date NOT NULL,
  `promo` int NOT NULL,
  PRIMARY KEY (`coupon_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coupon`
--

LOCK TABLES `coupon` WRITE;
/*!40000 ALTER TABLE `coupon` DISABLE KEYS */;
INSERT INTO `coupon` VALUES (1,'AB2023','2026-08-07','2021-10-14',20),(2,'lili','2023-08-08','2026-08-26',100);
/*!40000 ALTER TABLE `coupon` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `item`
--

DROP TABLE IF EXISTS `item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `item` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  `category` varchar(50) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `qte` int NOT NULL,
  `src1` varchar(100) NOT NULL,
  `src2` varchar(100) NOT NULL,
  `last_update` datetime NOT NULL,
  `ratting` int NOT NULL,
  `color` varchar(50) NOT NULL,
  `keyword` varchar(100) NOT NULL,
  `src3` varchar(50) NOT NULL,
  `src4` varchar(50) NOT NULL,
  `Specs` varchar(300) NOT NULL,
  `price` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `item`
--

LOCK TABLES `item` WRITE;
/*!40000 ALTER TABLE `item` DISABLE KEYS */;
INSERT INTO `item` VALUES (1,'Intel Core i9 12900K','Built using a Hybrid Core architecture with the Intel 7 process, this 12th generation desktop proces','composant','intel',1,'assets/images/product/2.jpg','assets/images/product/1.webp','2023-08-01 09:00:53',4,'','core,intel,i9,12th,cpu,composant,i9 12th','','','',125000),(2,'logitech g502','LE V├ëRITABLE H├ëROS DE VOS JEUX. La souris G502 HERO pr├⌐sente un capteur optique avanc├⌐ pour une pr├⌐c','accessory','logitech',1,'assets/images/product/3.webp','assets/images/product/1.jfif','2023-08-01 09:19:03',4,'black','mouse,logitech,g502,accessory','','','Sensor : HEROΓäó,Resolution	100 ΓÇô 16 000 dpi,acceleration	> 40 G2,Max. speed> 400 IPS3,USB data format	16 bits/axis,USB report rate	1000 Hz (1ms),Microprocessor-RAM	32-bit ARM,buttons	11,Dimensions	Height: 5.2 in (132 mm) Width: 2.95 in (75 mm) Depth: 1.57 in (40 mm)',13000),(3,'Carte Graphique AMD Radeon RX 580 8GB','The Radeon RX 580 is a performance-segment graphics card by AMD, launched on April 18th, 2017. Built','composant','amd',1,'assets/images/product/7.jpg','assets/images/product/4.webp','2023-08-01 09:35:39',4,'black','gpu,amd,rx580,rx 580,radeon,composant','','','',25000),(4,'Carte Graphique NVIDIA RTX 3080','La GeForce RTX 3080 tire sa puissance d\'un nombre cons├⌐quent de coeurs. Ce ne sont pas moins de 8704','composant','nvidia',1,'assets/images/product/2.webp','assets/images/product/1.jpg','2023-08-01 09:39:23',5,'black','gpu,nvidia,rtx,3080,composant','','','',225000),(5,'Disque dur interne SSD 128gb','SSD de haute qualit├⌐, combin├⌐ avec un contr├┤leur de haute qualit├⌐ leader de l\'industrie. ΓÇ╗ 2.5 pouce','composant','SomnAmbulist',1,'assets/images/product/9.jpg','assets/images/product/10.jpg','2023-08-02 07:47:18',4,'black','ssd,128,disque,composant','','','',3000),(6,'Disque dur interne SSD 256gb','assets/images/product/9.jpg','composant','SomnAmbulist',1,'assets/images/product/9.jpg','assets/images/product/10.jpg','2023-08-02 08:03:48',4,'black','ssd,256,disque,composant','','','',3500),(7,'hp Elitbook 840 G5 i7-8├⌐me 16gb ram 256ssd','Gr├óce ├á son processeur Intel Core i7-8250U, ses 16 Go de m├⌐moire DDR4 et son SSD M. 2 PCIe de 512 Go','pc','hp',1,'assets/images/product/4.png','assets/images/product/3.png','2023-08-03 07:49:06',4,'gray','pc,hp,16gb,i7,8th,i7 8th,14 pouces','assets/images/product/13.jpg','assets/images/product/11.jpg','Processeur : i7-8├⌐me Min : 2.8Ghz (8CPUs),RAM : 16GB,SSD : 256GB,clavier lumineux + empreinte + Face ID,Carte graphique : uhd620,├ëtat : 9 /10,Estimation Batterie ≡ƒöï : +4h,├ëcran : 14.1ΓÇ£ Full HD,Avec un chargeur',67000),(8,'Dell latitude 5420 i5-11th Iris xe Graphics 16gb','','pc','dell',1,'assets/images/product/5.png','assets/images/product/14.jpg','2023-08-03 07:59:06',5,'gray','pc,dell,i5,11th,i5 11th,16gb,gray,iris,iris xe,xe','assets/images/product/12.jpg','','Processeur :  i5-1145G7 Min : 2.6Ghz (8CPUs),RAM : 16 GB,SSD : 256 GB,clavier lumineux,Carte graphique : intel Iris xe Graphics,├ëtat : 9.5/10,Estimation Batterie ≡ƒöï : +4h,├ëcran : 14 ΓÇ£fullhd,Avec un chargeur original',87000);
/*!40000 ALTER TABLE `item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order_items` (
  `order_id` int NOT NULL,
  `product_id` int NOT NULL,
  `qty` int DEFAULT NULL,
  PRIMARY KEY (`order_id`,`product_id`),
  KEY `product_id` (`product_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_items`
--

LOCK TABLES `order_items` WRITE;
/*!40000 ALTER TABLE `order_items` DISABLE KEYS */;
INSERT INTO `order_items` VALUES (11,4,1),(10,3,1),(10,4,1),(9,3,1),(9,4,1),(8,8,2),(7,1,1),(6,1,1),(5,7,2),(5,8,1),(4,3,1),(4,2,1),(4,1,1),(3,3,1),(3,1,1),(3,5,1),(2,3,1),(2,1,1),(2,5,1),(1,3,1),(1,1,1),(1,5,1),(11,3,1),(12,4,1),(12,3,1),(13,4,1),(13,3,1),(14,4,1),(14,3,1),(15,2,1),(15,7,1);
/*!40000 ALTER TABLE `order_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders` (
  `order_id` int NOT NULL AUTO_INCREMENT,
  `customer_id` varchar(50) DEFAULT NULL,
  `order_date` datetime DEFAULT NULL,
  `total` int DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `shipping_address` text,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `promo` int NOT NULL,
  PRIMARY KEY (`order_id`),
  KEY `customer_id` (`customer_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (3,'omeiri.abdellah','2023-08-08 23:58:25',126400,'progress','19 Impasse mokhtar abdelatif alger ','0657271942','abdouommca3@gmail.com','Abdellah',0),(1,'omeiri.abdellah','2023-08-08 23:54:22',142400,'progress','61 avenue Saint Eug├¿ne BP 204(31024-Oran RP), 31000','0752524255','abdouommca3@gmail.com','abdellah',0),(2,'omeiri.abdellah','2023-08-08 23:56:55',142400,'progress','61 avenue Saint Eug├¿ne BP 204(31024-Oran RP), 31000','0752524255','abdouommca3@gmail.com','abdellah',0),(4,'omeiri.abdellah','2023-08-09 11:10:09',0,'progress','61 avenue Saint Eug├¿ne BP 204(31024-Oran RP), 31000','0752524255','omeiri.abdellah@gmail.com','Torkia Linda',0),(5,'Abdou.omeiri','2023-08-09 12:23:38',176800,'progress','Mahalma','0657271942','Omeiri.abdellah@gmail.com','Abdellah',0),(6,'Abdou.omeiri','2023-08-09 12:56:26',100000,'progress','Mahalma','0657271942','Omeiri.abdellah@gmail.com','Abdellah',0),(7,'Abdou.omeiri','2023-08-09 14:34:03',125000,'progress','Mahalma','0657271942','Omeiri.abdellah@gmail.com','Abdellah',0),(8,'Abdou.omeiri','2023-08-09 14:36:53',0,'progress','Mahalma','0657271942','Omeiri.abdellah@gmail.com','Abdellah',0),(9,'alae','2023-08-10 01:26:01',250000,'progress','19 Impasse mokhtar abdelatif alger ','0752524255','abdouommca3@gmail.com','Abdellah',0),(10,'alae','2023-08-10 01:28:31',250000,'progress','19 Impasse mokhtar abdelatif alger ','0657271942','abdouommca3@gmail.com','Abdellah',0),(11,'alae','2023-08-10 01:29:22',250000,'progress','19 Impasse mokhtar abdelatif alger ','0657271942','abdouommca3@gmail.com','Abdellah',0),(12,'alae','2023-08-10 01:34:13',250000,'progress','412 cir=te ','0657271942','abdouommca3@gmail.com','Abdellah',0),(13,'alae','2023-08-10 01:37:20',250000,'progress','61 avenue Saint Eug├¿ne BP 204(31024-Oran RP), 31000','0657271942','abdouommca3@gmail.com','Abdellah',50000),(14,'omeiri.abdellah','2023-08-10 01:41:46',250000,'progress','61 avenue Saint Eug├¿ne BP 204(31024-Oran RP), 31000','0657271942','abdouommca3@gmail.com','Abdellah',50000),(15,NULL,'2023-08-10 01:58:52',80000,'progress','Mahalma','0657271942','Omeiri.abdellah@gmail.com','Abdellah',80000);
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `price`
--

DROP TABLE IF EXISTS `price`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `price` (
  `history_id` int NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL,
  `price` int NOT NULL,
  `valid_from` datetime NOT NULL,
  `valid_to` datetime DEFAULT NULL,
  PRIMARY KEY (`history_id`),
  KEY `product_id` (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `price`
--

LOCK TABLES `price` WRITE;
/*!40000 ALTER TABLE `price` DISABLE KEYS */;
INSERT INTO `price` VALUES (1,1,122500,'2023-08-08 20:00:18','2023-08-08 00:00:00'),(2,1,123000,'2023-08-01 19:41:04','2023-08-08 19:01:04'),(3,2,12800,'2023-08-02 19:11:27','2023-08-03 19:11:27'),(4,2,13000,'2023-08-08 18:12:02',NULL),(5,5,2500,'2023-08-08 18:35:24','2023-08-08 23:16:50'),(6,3,25000,'2023-08-08 18:36:20',NULL),(7,3,30000,'2023-08-02 19:36:39',NULL),(8,8,87000,'2023-08-08 18:39:03',NULL),(9,7,67000,'2023-08-08 18:39:12',NULL),(10,6,3500,'2023-08-08 18:39:19',NULL),(11,4,225000,'2023-08-08 18:39:31',NULL),(12,1,10,'2023-06-30 23:02:04','2023-07-03 23:02:04'),(13,5,3000,'2023-08-08 23:17:14',NULL),(14,1,150000,'2023-08-08 23:20:32','2023-08-08 23:55:39'),(15,1,130000,'2023-08-08 23:55:48',NULL),(16,1,125000,'2023-08-09 00:16:45',NULL);
/*!40000 ALTER TABLE `price` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `review`
--

DROP TABLE IF EXISTS `review`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `review` (
  `review_id` int NOT NULL,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) NOT NULL,
  `comment` varchar(100) NOT NULL,
  `item_id` int NOT NULL,
  PRIMARY KEY (`review_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `review`
--

LOCK TABLES `review` WRITE;
/*!40000 ALTER TABLE `review` DISABLE KEYS */;
INSERT INTO `review` VALUES (1,'Abdellah','ab','hello',7),(2,'Abdellah','abdouommca@gmail.com','sd',7),(3,'Abdellah','omeiri.abdellah@gmail.com','Wonderful',7),(4,'Abdou','Omeiri.abdellah@gmail.com','This pc is aweasom',7);
/*!40000 ALTER TABLE `review` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `username` varchar(50) NOT NULL,
  `password` varchar(20) DEFAULT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `address` text,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES ('omeiri.abdellah','root','ABDELLAH','Om','61 avenue Saint Eug├¿ne BP 204(31024-Oran RP), 31000','omeiri.abdellah@gmail.com'),('Abdou.omeiri','abdoumca009','Omeiri','Abdellah',NULL,'abdouommca@gmail.com'),('Alae','hh','Omeiri','Abdellah',NULL,'abdouommca3@gmail.com');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-01-24 22:09:18
