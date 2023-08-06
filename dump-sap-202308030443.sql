-- MariaDB dump 10.19  Distrib 10.6.12-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: sap
-- ------------------------------------------------------
-- Server version	10.6.12-MariaDB-0ubuntu0.22.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `additives`
--

DROP TABLE IF EXISTS `additives`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `additives` (
  `id_additive` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kode_additive` varchar(255) NOT NULL,
  `nama_additive` varchar(255) NOT NULL,
  `price_additive` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_additive`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `additives`
--

LOCK TABLES `additives` WRITE;
/*!40000 ALTER TABLE `additives` DISABLE KEYS */;
INSERT INTO `additives` VALUES (1,'AD01','SILICON',10000,'2023-07-18 19:03:10','2023-07-18 19:03:49'),(2,'AD02','TEMBAGA',10000,'2023-07-18 19:03:21','2023-07-18 19:03:21'),(3,'AD03','MAGNESIUM',10000,'2023-07-18 19:03:29','2023-07-18 19:03:29'),(4,'AD04','AL TAB MN',1000,'2023-07-18 19:03:37','2023-07-18 19:03:37');
/*!40000 ALTER TABLE `additives` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `banks`
--

DROP TABLE IF EXISTS `banks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `banks` (
  `id_bank` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kode_bank` varchar(255) NOT NULL,
  `nama_bank` varchar(255) NOT NULL,
  `no_rek_bank` varchar(255) NOT NULL,
  `currency_bank` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_bank`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `banks`
--

LOCK TABLES `banks` WRITE;
/*!40000 ALTER TABLE `banks` DISABLE KEYS */;
INSERT INTO `banks` VALUES (1,'B01','BNI','4999955591','IDR','2023-07-18 09:38:16','2023-07-18 09:40:02'),(2,'B02','BCA','7571999688','IDR','2023-07-18 09:38:29','2023-07-18 09:38:29'),(3,'B03','MANDIRI','1560056775788','IDR','2023-07-18 09:38:40','2023-07-18 09:38:40'),(4,'B04','BRI','031901000223306','IDR','2023-07-18 09:38:54','2023-07-18 09:38:54');
/*!40000 ALTER TABLE `banks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `basemetals`
--

DROP TABLE IF EXISTS `basemetals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `basemetals` (
  `id_base_metal` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kode_base_metal` varchar(255) NOT NULL,
  `nama_base_metal` varchar(255) NOT NULL,
  `price_base_metal` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_base_metal`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `basemetals`
--

LOCK TABLES `basemetals` WRITE;
/*!40000 ALTER TABLE `basemetals` DISABLE KEYS */;
INSERT INTO `basemetals` VALUES (1,'BM1','BM  AC  L J A',10000,'2023-07-18 18:56:15','2023-07-18 18:59:30'),(2,'BM2','BM PLAT MN L J A',10000,'2023-07-18 18:56:15','2023-07-18 18:56:15'),(3,'BM3','BM DC L J A',10000,'2023-07-18 18:56:15','2023-07-18 18:56:15'),(4,'BM4','BM AC LEMBEK AIN',10000,'2023-07-18 18:56:15','2023-07-18 18:56:15'),(5,'BM5','BM DC AIN',10000,'2023-07-18 18:56:15','2023-07-18 18:56:15'),(6,'BM6','BM ADC IRFAN',10000,'2023-07-18 18:56:15','2023-07-18 18:56:15'),(7,'BM7','BM LBK HASAN',10000,'2023-07-18 18:56:15','2023-07-18 18:56:15'),(8,'BM8','BM ADC HASAN',10000,'2023-07-18 18:56:15','2023-07-18 18:56:15'),(9,'BM9','BM AC2C',10000,'2023-07-18 18:56:15','2023-07-18 18:56:15'),(10,'BM10','BM PRESS AC2C',10000,'2023-07-18 18:56:15','2023-07-18 18:56:15'),(11,'BM11','BM PRESS ADC',10000,'2023-07-18 18:56:15','2023-07-18 18:56:15'),(12,'BM12','BM ADC NG',10000,'2023-07-18 18:56:15','2023-07-18 18:56:15'),(13,'BM13','INGOT AC2C NG ',10000,'2023-07-18 18:56:15','2023-07-18 18:56:15');
/*!40000 ALTER TABLE `basemetals` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cashflows`
--

DROP TABLE IF EXISTS `cashflows`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cashflows` (
  `id_cash_flow` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `bank` varchar(255) NOT NULL,
  `beginning_balance` bigint(20) NOT NULL,
  `incoming_balance` bigint(20) DEFAULT NULL,
  `out_balance` bigint(20) DEFAULT NULL,
  `ending_balance` bigint(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_cash_flow`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cashflows`
--

LOCK TABLES `cashflows` WRITE;
/*!40000 ALTER TABLE `cashflows` DISABLE KEYS */;
INSERT INTO `cashflows` VALUES (11,'BNI',1000000000,18000,1111,NULL,'2023-07-22 21:13:46','2023-07-23 02:09:46'),(12,'BCA',2000000000,NULL,NULL,NULL,'2023-07-22 21:13:46','2023-07-22 21:13:46'),(13,'MANDIRI',3000000000,NULL,NULL,NULL,'2023-07-22 21:13:46','2023-07-22 21:13:46'),(14,'BRI',4000000000,NULL,NULL,NULL,'2023-07-22 21:13:46','2023-07-22 21:13:46');
/*!40000 ALTER TABLE `cashflows` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `customers`
--

DROP TABLE IF EXISTS `customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customers` (
  `id_customer` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kode_customer` varchar(255) NOT NULL,
  `nama_customer` varchar(255) NOT NULL,
  `alamat_customer` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_customer`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customers`
--

LOCK TABLES `customers` WRITE;
/*!40000 ALTER TABLE `customers` DISABLE KEYS */;
INSERT INTO `customers` VALUES (1,'C01','PT. AISIN INDONESIA ','KARAWANG','2023-07-18 09:33:18','2023-07-18 09:34:39'),(2,'C02','PT. TMMIN','KARAWANG','2023-07-18 09:33:27','2023-07-18 09:33:27'),(3,'C03','PT. TACI','BEKASI','2023-07-18 09:33:38','2023-07-18 09:33:38'),(4,'C04','PT. NAKAKIN','CIKARANG','2023-07-18 09:33:47','2023-07-18 09:33:47');
/*!40000 ALTER TABLE `customers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detail_po_customers`
--

DROP TABLE IF EXISTS `detail_po_customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detail_po_customers` (
  `id_detail_po_customers` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_po_customer` int(11) NOT NULL,
  `id_part_customer` int(11) NOT NULL,
  `qty_po_customer` int(11) NOT NULL,
  `harga_po_customer` int(11) NOT NULL,
  `uom` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_detail_po_customers`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detail_po_customers`
--

LOCK TABLES `detail_po_customers` WRITE;
/*!40000 ALTER TABLE `detail_po_customers` DISABLE KEYS */;
INSERT INTO `detail_po_customers` VALUES (1,3,1,1212,3434,'kg','2023-07-28 22:31:00','2023-07-28 22:31:00'),(2,3,3,2332,34234,'kg','2023-07-28 22:35:25','2023-07-28 22:35:25'),(3,4,4,112,122,'kg','2023-07-31 03:53:19','2023-07-31 03:53:19');
/*!40000 ALTER TABLE `detail_po_customers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detail_po_suppliers`
--

DROP TABLE IF EXISTS `detail_po_suppliers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detail_po_suppliers` (
  `id_detail_po` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_material` int(11) NOT NULL,
  `id_po` int(11) NOT NULL,
  `qty_po` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `uom` varchar(100) DEFAULT NULL,
  `harga_po` varchar(100) DEFAULT NULL,
  `qty_gr` int(11) DEFAULT NULL,
  `harga_gr` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_detail_po`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detail_po_suppliers`
--

LOCK TABLES `detail_po_suppliers` WRITE;
/*!40000 ALTER TABLE `detail_po_suppliers` DISABLE KEYS */;
INSERT INTO `detail_po_suppliers` VALUES (1,10,1,1000,'2023-07-21 05:16:55','2023-07-23 06:17:54','kg','2343',1,NULL),(2,12,1,1212,'2023-07-21 05:37:19','2023-07-23 06:45:27','kg','2000',2,NULL),(3,13,1,2000,'2023-07-21 05:39:15','2023-07-23 06:45:29','kg','8000',3,NULL),(4,1,1,100,'2023-07-21 20:16:42','2023-07-23 06:45:31','kg','700',4,NULL),(5,1,2,12,'2023-07-23 07:33:52','2023-07-23 07:33:52','kg','323232',NULL,NULL),(6,1,3,12,'2023-07-23 07:50:25','2023-07-23 07:50:25','kg','2323',NULL,NULL);
/*!40000 ALTER TABLE `detail_po_suppliers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detail_prod_g1s`
--

DROP TABLE IF EXISTS `detail_prod_g1s`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detail_prod_g1s` (
  `id_detail_prod_g1` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_prod_g1` int(11) NOT NULL,
  `id_gudang_satu` int(11) NOT NULL,
  `price_g1` int(11) DEFAULT NULL,
  `qty_prod_g1` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_part` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_detail_prod_g1`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detail_prod_g1s`
--

LOCK TABLES `detail_prod_g1s` WRITE;
/*!40000 ALTER TABLE `detail_prod_g1s` DISABLE KEYS */;
INSERT INTO `detail_prod_g1s` VALUES (45,7,116,111,22,'2023-08-02 05:44:20','2023-08-02 05:44:20',NULL),(46,7,120,22,11,'2023-08-02 05:44:20','2023-08-02 05:44:20',NULL),(47,7,122,33,11,'2023-08-02 05:44:20','2023-08-02 05:44:20',NULL),(48,8,116,11,22,'2023-08-02 05:45:52','2023-08-02 05:45:52',NULL),(49,8,118,33,66,'2023-08-02 05:45:52','2023-08-02 05:45:52',NULL),(50,8,131,1212,3332,'2023-08-02 05:46:10','2023-08-02 05:46:10',NULL),(51,8,132,3434,2323,'2023-08-02 05:46:10','2023-08-02 05:46:10',NULL),(52,8,114,121212,3434,'2023-08-02 05:46:28','2023-08-02 05:46:28',NULL),(53,8,111,2323,1122,'2023-08-02 05:46:28','2023-08-02 05:46:28',NULL);
/*!40000 ALTER TABLE `detail_prod_g1s` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detail_prod_g2s`
--

DROP TABLE IF EXISTS `detail_prod_g2s`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detail_prod_g2s` (
  `id_detail_prod_g2` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_prod_g2` int(11) NOT NULL,
  `id_gudang_dua` int(11) NOT NULL,
  `price_g2` int(11) DEFAULT NULL,
  `qty_prod_g2` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category_part` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_detail_prod_g2`)
) ENGINE=InnoDB AUTO_INCREMENT=107 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detail_prod_g2s`
--

LOCK TABLES `detail_prod_g2s` WRITE;
/*!40000 ALTER TABLE `detail_prod_g2s` DISABLE KEYS */;
INSERT INTO `detail_prod_g2s` VALUES (102,42,1,10000,80,'2023-08-02 05:05:46','2023-08-02 05:05:46',NULL),(103,42,3,20000,90,'2023-08-02 05:05:46','2023-08-02 05:05:46',NULL),(104,42,6,30000,100,'2023-08-02 05:05:46','2023-08-02 05:05:46',NULL),(105,42,32,100000,80,'2023-08-02 05:06:12','2023-08-02 05:06:12',NULL),(106,42,36,200000,100,'2023-08-02 05:06:12','2023-08-02 05:06:12',NULL);
/*!40000 ALTER TABLE `detail_prod_g2s` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grs`
--

DROP TABLE IF EXISTS `grs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grs` (
  `id_gr` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_detail_po` int(11) NOT NULL,
  `tgl_gr` date NOT NULL,
  `gudang` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_material` varchar(100) DEFAULT NULL,
  `qty_gr` varchar(100) DEFAULT NULL,
  `uom` varchar(100) DEFAULT NULL,
  `harga_gr` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_gr`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grs`
--

LOCK TABLES `grs` WRITE;
/*!40000 ALTER TABLE `grs` DISABLE KEYS */;
INSERT INTO `grs` VALUES (19,1,'2023-07-23','gudang_dua','2023-07-23 07:43:01','2023-07-23 08:14:12','10','80','kg','2343'),(20,2,'2023-07-23','gudang_dua','2023-07-23 07:43:01','2023-07-23 07:44:56','12','20','kg','2000'),(21,3,'2023-07-23','gudang_dua','2023-07-23 07:43:01','2023-07-23 07:44:58','13','30','kg','8000'),(22,4,'2023-07-23','gudang_dua','2023-07-23 07:43:01','2023-07-23 07:45:01','1','40','kg','700'),(23,5,'2023-07-23','gudang_dua','2023-07-23 07:46:24','2023-07-23 07:46:26','1','40','kg','323232'),(24,1,'2023-07-19','gudang_dua','2023-07-23 08:09:35','2023-07-23 08:09:53','10','100','kg','2343'),(25,2,'2023-07-19','gudang_dua','2023-07-23 08:09:35','2023-07-23 08:09:35','12',NULL,'kg','2000'),(26,3,'2023-07-19','gudang_dua','2023-07-23 08:09:35','2023-07-23 08:09:35','13',NULL,'kg','8000'),(27,4,'2023-07-19','gudang_dua','2023-07-23 08:09:35','2023-07-23 08:09:35','1',NULL,'kg','700');
/*!40000 ALTER TABLE `grs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gudang_duas`
--

DROP TABLE IF EXISTS `gudang_duas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gudang_duas` (
  `id_gudang_dua` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `part_no` varchar(255) NOT NULL,
  `part_name` varchar(255) NOT NULL,
  `category_part` varchar(255) NOT NULL,
  `beginning_balance` int(11) NOT NULL,
  `incoming_balance` int(11) DEFAULT NULL,
  `usage_balance` int(11) DEFAULT NULL,
  `ending_balance` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_gudang_dua`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gudang_duas`
--

LOCK TABLES `gudang_duas` WRITE;
/*!40000 ALTER TABLE `gudang_duas` DISABLE KEYS */;
INSERT INTO `gudang_duas` VALUES (1,'M01','GRAM MACHINING TACI','RM',755,150,100,NULL,'2023-07-21 19:40:35','2023-07-21 22:40:49'),(2,'M02','GRAM PISTON TACI','RM',770,NULL,NULL,NULL,'2023-07-21 19:40:35','2023-07-21 19:40:35'),(3,'M03','GRAM SWASH TACI','RM',892,NULL,NULL,NULL,'2023-07-21 19:40:35','2023-07-21 19:40:35'),(4,'M04','HOMEL DROSS TACI','RM',163,NULL,NULL,NULL,'2023-07-21 19:40:35','2023-07-21 19:40:35'),(5,'M05','PART NG PISTON TACI','RM',932,NULL,NULL,NULL,'2023-07-21 19:40:35','2023-07-21 19:40:35'),(6,'M06','DROSS ENKEI','RM',989,NULL,NULL,NULL,'2023-07-21 19:40:35','2023-07-21 19:40:35'),(7,'M07','AL TUBE DENSO','RM',781,NULL,NULL,NULL,'2023-07-21 19:40:35','2023-07-21 19:40:35'),(8,'M08','AL. PLATE DENSO','RM',225,NULL,NULL,NULL,'2023-07-21 19:40:35','2023-07-21 19:40:35'),(9,'M09','AL.RDTR POTRAD DENSO','RM',369,NULL,NULL,NULL,'2023-07-21 19:40:35','2023-07-21 19:40:35'),(10,'M10','KIRIKO AISIN','RM',252,180,NULL,NULL,'2023-07-21 19:40:35','2023-07-23 08:14:12'),(11,'M11','DROSS AISIN','RM',391,NULL,NULL,NULL,'2023-07-21 19:40:35','2023-07-21 19:40:35'),(12,'M12','ADVICS KIRIKO','RM',205,NULL,NULL,NULL,'2023-07-21 19:40:35','2023-07-21 19:40:35'),(13,'M13','TEBAL BERSIH','RM',385,NULL,NULL,NULL,'2023-07-21 19:40:35','2023-07-21 19:40:35'),(14,'M14','TEBAL KOTOR','RM',467,NULL,NULL,NULL,'2023-07-21 19:40:35','2023-07-21 19:40:35'),(15,'M15','TEBAL BARU','RM',527,NULL,NULL,NULL,'2023-07-21 19:40:35','2023-07-21 19:40:35'),(16,'M16','TEBAL BIASA','RM',312,NULL,NULL,NULL,'2023-07-21 19:40:35','2023-07-21 19:40:35'),(17,'M17','PLAT BIASA','RM',567,NULL,NULL,NULL,'2023-07-21 19:40:35','2023-07-21 19:40:35'),(18,'M18','PLAT BARU','RM',748,NULL,NULL,NULL,'2023-07-21 19:40:35','2023-07-21 19:40:35'),(19,'M19','ALKOTEK','RM',429,NULL,NULL,NULL,'2023-07-21 19:40:35','2023-07-21 19:40:35'),(20,'M20','PLAT PANEL','RM',303,NULL,NULL,NULL,'2023-07-21 19:40:35','2023-07-21 19:40:35'),(21,'M21','PANCI','RM',301,NULL,NULL,NULL,'2023-07-21 19:40:35','2023-07-21 19:40:35'),(22,'M22','SIKU A','RM',923,NULL,NULL,NULL,'2023-07-21 19:40:35','2023-07-21 19:40:35'),(23,'M23','SIKU CAMPUR','RM',930,NULL,NULL,NULL,'2023-07-21 19:40:35','2023-07-21 19:40:35'),(24,'M24','KALENG PRESS','RM',545,NULL,NULL,NULL,'2023-07-21 19:40:35','2023-07-21 19:40:35'),(25,'M25','KRIPIK NKI','RM',624,NULL,NULL,NULL,'2023-07-21 19:40:35','2023-07-21 19:40:35'),(26,'M26','GRAM NKI','RM',260,NULL,NULL,NULL,'2023-07-21 19:40:35','2023-07-21 19:40:35'),(27,'M27','DROSS NKI','RM',546,NULL,NULL,NULL,'2023-07-21 19:40:35','2023-07-21 19:40:35'),(28,'M28','VELG MOTOR','RM',751,NULL,NULL,NULL,'2023-07-21 19:40:35','2023-07-21 19:40:35'),(29,'M29','VELG MOBIL','RM',483,NULL,NULL,NULL,'2023-07-21 19:40:35','2023-07-21 19:40:35'),(30,'M30','KAWAT','RM',191,NULL,NULL,NULL,'2023-07-21 19:40:35','2023-07-21 19:40:35'),(31,'M31','OFSET','RM',908,NULL,NULL,NULL,'2023-07-21 19:40:35','2023-07-21 19:40:35'),(32,'BM1','BM  AC  L J A','FG',217,NULL,10,NULL,'2023-07-21 19:40:35','2023-07-21 22:49:23'),(33,'BM2','BM PLAT MN L J A','FG',422,NULL,NULL,NULL,'2023-07-21 19:40:35','2023-07-21 19:40:35'),(34,'BM3','BM DC L J A','FG',111,12,NULL,NULL,'2023-07-21 19:40:35','2023-07-21 22:28:29'),(35,'BM4','BM AC LEMBEK AIN','FG',413,NULL,NULL,NULL,'2023-07-21 19:40:35','2023-07-21 19:40:35'),(36,'BM5','BM DC AIN','FG',679,NULL,NULL,NULL,'2023-07-21 19:40:35','2023-07-21 19:40:35'),(37,'BM6','BM ADC IRFAN','FG',785,NULL,NULL,NULL,'2023-07-21 19:40:35','2023-07-21 19:40:35'),(38,'BM7','BM LBK HASAN','FG',115,NULL,NULL,NULL,'2023-07-21 19:40:35','2023-07-21 19:40:35'),(39,'BM8','BM ADC HASAN','FG',105,NULL,NULL,NULL,'2023-07-21 19:40:35','2023-07-21 19:40:35'),(40,'BM9','BM AC2C','FG',892,NULL,NULL,NULL,'2023-07-21 19:40:35','2023-07-21 19:40:35'),(41,'BM10','BM PRESS AC2C','FG',350,NULL,NULL,NULL,'2023-07-21 19:40:35','2023-07-21 19:40:35'),(42,'BM11','BM PRESS ADC','FG',153,NULL,NULL,NULL,'2023-07-21 19:40:35','2023-07-21 19:40:35'),(43,'BM12','BM ADC NG','FG',554,NULL,NULL,NULL,'2023-07-21 19:40:35','2023-07-21 19:40:35'),(44,'BM13','INGOT AC2C NG ','FG',866,NULL,NULL,NULL,'2023-07-21 19:40:35','2023-07-21 19:40:35');
/*!40000 ALTER TABLE `gudang_duas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gudang_satus`
--

DROP TABLE IF EXISTS `gudang_satus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gudang_satus` (
  `id_gudang_satu` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `part_no` varchar(255) NOT NULL,
  `part_name` varchar(255) NOT NULL,
  `category_part` varchar(255) NOT NULL,
  `beginning_balance` int(11) NOT NULL,
  `incoming_balance` int(11) DEFAULT NULL,
  `usage_balance` int(11) DEFAULT NULL,
  `ending_balance` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_gudang_satu`)
) ENGINE=InnoDB AUTO_INCREMENT=133 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gudang_satus`
--

LOCK TABLES `gudang_satus` WRITE;
/*!40000 ALTER TABLE `gudang_satus` DISABLE KEYS */;
INSERT INTO `gudang_satus` VALUES (111,'P01','ADC12','FG',100,22,10,NULL,'2023-07-22 00:50:10','2023-07-22 02:13:50'),(112,'P02','ADT4','FG',100,NULL,1111,NULL,'2023-07-22 00:50:10','2023-07-31 03:33:03'),(113,'P03','AC2C','FG',100,NULL,NULL,NULL,'2023-07-22 00:50:10','2023-07-22 00:50:10'),(114,'P04','AC2B','FG',500,NULL,NULL,NULL,'2023-07-22 00:50:10','2023-07-22 00:50:10'),(115,'P05','AC4B','FG',500,NULL,NULL,NULL,'2023-07-22 00:50:10','2023-07-22 00:50:10'),(116,'BM1','BM  AC  L J A','RM',217,NULL,30,NULL,'2023-07-22 00:50:10','2023-07-22 01:51:32'),(117,'BM2','BM PLAT MN L J A','RM',422,NULL,NULL,NULL,'2023-07-22 00:50:10','2023-07-22 00:50:10'),(118,'BM3','BM DC L J A','RM',111,NULL,NULL,NULL,'2023-07-22 00:50:10','2023-07-22 00:50:10'),(119,'BM4','BM AC LEMBEK AIN','RM',413,NULL,NULL,NULL,'2023-07-22 00:50:10','2023-07-22 00:50:10'),(120,'BM5','BM DC AIN','RM',679,NULL,NULL,NULL,'2023-07-22 00:50:10','2023-07-22 00:50:10'),(121,'BM6','BM ADC IRFAN','RM',785,NULL,NULL,NULL,'2023-07-22 00:50:10','2023-07-22 00:50:10'),(122,'BM7','BM LBK HASAN','RM',115,NULL,NULL,NULL,'2023-07-22 00:50:10','2023-07-22 00:50:10'),(123,'BM8','BM ADC HASAN','RM',105,NULL,NULL,NULL,'2023-07-22 00:50:10','2023-07-22 00:50:10'),(124,'BM9','BM AC2C','RM',892,NULL,NULL,NULL,'2023-07-22 00:50:10','2023-07-22 00:50:10'),(125,'BM10','BM PRESS AC2C','RM',350,NULL,NULL,NULL,'2023-07-22 00:50:10','2023-07-22 00:50:10'),(126,'BM11','BM PRESS ADC','RM',153,NULL,NULL,NULL,'2023-07-22 00:50:10','2023-07-22 00:50:10'),(127,'BM12','BM ADC NG','RM',554,NULL,NULL,NULL,'2023-07-22 00:50:10','2023-07-22 00:50:10'),(128,'BM13','INGOT AC2C NG ','RM',866,NULL,NULL,NULL,'2023-07-22 00:50:10','2023-07-22 00:50:10'),(129,'AD01','SILICON','NON_RM',362,NULL,NULL,NULL,'2023-07-22 00:50:10','2023-07-22 00:50:10'),(130,'AD02','TEMBAGA','NON_RM',818,NULL,NULL,NULL,'2023-07-22 00:50:10','2023-07-22 00:50:10'),(131,'AD03','MAGNESIUM','NON_RM',444,NULL,NULL,NULL,'2023-07-22 00:50:10','2023-07-22 00:50:10'),(132,'AD04','AL TAB MN','NON_RM',832,NULL,NULL,NULL,'2023-07-22 00:50:10','2023-07-22 00:50:10');
/*!40000 ALTER TABLE `gudang_satus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `incoming_cashes`
--

DROP TABLE IF EXISTS `incoming_cashes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `incoming_cashes` (
  `id_incoming_cashes` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_customer` int(11) NOT NULL,
  `top` varchar(255) NOT NULL,
  `po_customer` varchar(255) NOT NULL,
  `amount_incoming` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_bank` int(11) DEFAULT NULL,
  `tgl_incoming_cash` date DEFAULT NULL,
  PRIMARY KEY (`id_incoming_cashes`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `incoming_cashes`
--

LOCK TABLES `incoming_cashes` WRITE;
/*!40000 ALTER TABLE `incoming_cashes` DISABLE KEYS */;
INSERT INTO `incoming_cashes` VALUES (1,1,'1mnth','po_cu1',9000,'2023-07-22 23:59:46','2023-07-22 23:59:46',1,'2023-07-23'),(2,1,'1mnth','po_cu1',9000,'2023-07-23 00:03:19','2023-07-23 00:03:19',1,'2023-07-23');
/*!40000 ALTER TABLE `incoming_cashes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invoices`
--

DROP TABLE IF EXISTS `invoices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `invoices` (
  `id_invoice` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `no_invoice` varchar(255) NOT NULL,
  `tgl_invoice` date NOT NULL,
  `no_fp` varchar(255) NOT NULL,
  `id_po_customer` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_invoice`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invoices`
--

LOCK TABLES `invoices` WRITE;
/*!40000 ALTER TABLE `invoices` DISABLE KEYS */;
INSERT INTO `invoices` VALUES (1,'121212','2023-07-19','1212',3,'2023-07-31 03:48:35','2023-07-31 03:48:35'),(2,'342','2023-07-15','43545',3,'2023-07-31 03:49:44','2023-07-31 03:49:44'),(3,'3243','2023-07-21','432432',4,'2023-07-31 03:53:40','2023-07-31 03:53:40');
/*!40000 ALTER TABLE `invoices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `materials`
--

DROP TABLE IF EXISTS `materials`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `materials` (
  `id_material` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kode_material` varchar(255) NOT NULL,
  `nama_material` varchar(255) NOT NULL,
  `price_material` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_material`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `materials`
--

LOCK TABLES `materials` WRITE;
/*!40000 ALTER TABLE `materials` DISABLE KEYS */;
INSERT INTO `materials` VALUES (1,'M01','GRAM MACHINING TACI','1000','2023-07-18 18:46:10','2023-07-18 18:49:47'),(2,'M02','GRAM PISTON TACI','1000','2023-07-18 18:46:10','2023-07-18 18:46:10'),(3,'M03','GRAM SWASH TACI','1000','2023-07-18 18:46:10','2023-07-18 18:46:10'),(4,'M04','HOMEL DROSS TACI','1000','2023-07-18 18:46:10','2023-07-18 18:46:10'),(5,'M05','PART NG PISTON TACI','1000','2023-07-18 18:46:10','2023-07-18 18:46:10'),(6,'M06','DROSS ENKEI','1000','2023-07-18 18:46:10','2023-07-18 18:46:10'),(7,'M07','AL TUBE DENSO','1000','2023-07-18 18:46:10','2023-07-18 18:46:10'),(8,'M08','AL. PLATE DENSO','1000','2023-07-18 18:46:10','2023-07-18 18:46:10'),(9,'M09','AL.RDTR POTRAD DENSO','1000','2023-07-18 18:46:10','2023-07-18 18:46:10'),(10,'M10','KIRIKO AISIN','1000','2023-07-18 18:46:10','2023-07-18 18:46:10'),(11,'M11','DROSS AISIN','1000','2023-07-18 18:46:10','2023-07-18 18:46:10'),(12,'M12','ADVICS KIRIKO','1000','2023-07-18 18:46:10','2023-07-18 18:46:10'),(13,'M13','TEBAL BERSIH','1000','2023-07-18 18:46:10','2023-07-18 18:46:10'),(14,'M14','TEBAL KOTOR','1000','2023-07-18 18:46:10','2023-07-18 18:46:10'),(15,'M15','TEBAL BARU','1000','2023-07-18 18:46:10','2023-07-18 18:46:10'),(16,'M16','TEBAL BIASA','1000','2023-07-18 18:46:10','2023-07-18 18:46:10'),(17,'M17','PLAT BIASA','1000','2023-07-18 18:46:10','2023-07-18 18:46:10'),(18,'M18','PLAT BARU','1000','2023-07-18 18:46:10','2023-07-18 18:46:10'),(19,'M19','ALKOTEK','1000','2023-07-18 18:46:10','2023-07-18 18:46:10'),(20,'M20','PLAT PANEL','1000','2023-07-18 18:46:10','2023-07-18 18:46:10'),(21,'M21','PANCI','1000','2023-07-18 18:46:10','2023-07-18 18:46:10'),(22,'M22','SIKU A','1000','2023-07-18 18:46:10','2023-07-18 18:46:10'),(23,'M23','SIKU CAMPUR','1000','2023-07-18 18:46:10','2023-07-18 18:46:10'),(24,'M24','KALENG PRESS','1000','2023-07-18 18:46:10','2023-07-18 18:46:10'),(25,'M25','KRIPIK NKI','1000','2023-07-18 18:46:10','2023-07-18 18:46:10'),(26,'M26','GRAM NKI','1000','2023-07-18 18:46:10','2023-07-18 18:46:10'),(27,'M27','DROSS NKI','1000','2023-07-18 18:46:10','2023-07-18 18:46:10'),(28,'M28','VELG MOTOR','1000','2023-07-18 18:46:10','2023-07-18 18:46:10'),(29,'M29','VELG MOBIL','1000','2023-07-18 18:46:10','2023-07-18 18:46:10'),(30,'M30','KAWAT','1000','2023-07-18 18:46:10','2023-07-18 18:46:10'),(31,'M31','OFSET','1000','2023-07-18 18:46:10','2023-07-18 18:46:10');
/*!40000 ALTER TABLE `materials` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2023_07_15_134941_CreateTableVendor',1),(4,'2023_07_15_135300_CreateTableCustomer',1),(5,'2023_07_15_135806_CreateTableBank',1),(6,'2023_07_15_140115_CreateTableTruk',1),(7,'2023_07_15_140616_CreateTablePo',1),(8,'2023_07_15_141029_CreateTableTop',1),(9,'2023_07_16_051922_CreateTableDetailPO',1),(10,'2023_07_16_052029_CreateTableNotePO',1),(11,'2023_07_16_223612_CreateTableStok',1),(12,'2023_07_17_133545_create_prods_table',1),(13,'2023_07_17_140611_create_sjs_table',1),(14,'2023_07_18_134043_create_produks_table',1),(15,'2023_07_18_134504_create_materials_table',1),(16,'2023_07_18_134621_create_basemetals_table',1),(17,'2023_07_18_134802_create_additives_table',1),(18,'2023_07_21_234222_create_gudang_satus_table',2),(19,'2023_07_21_234316_create_gudang_duas_table',2),(20,'2023_07_22_031945_create_grs_table',3),(21,'2023_07_22_044156_create_prod_g2s_table',4),(22,'2023_07_22_053030_create_usage_g2s_table',5),(26,'2023_07_22_080416_create_usage_g1s_table',6),(27,'2023_07_22_080421_create_prod_g1s_table',6),(28,'2023_07_22_080652_create_sj_g1s_table',6),(29,'2023_07_23_014739_create_cashflows_table',7),(30,'2023_07_23_041637_create_incoming_cashes_table',8),(31,'2023_07_23_071419_create_out_cashes_table',9),(32,'2023_07_24_132541_create_sops_table',10),(35,'2023_07_25_121035_create_stos_table',11),(36,'2023_07_25_125859_create_stog1s_table',12),(39,'2023_07_26_121303_create_po_customers_table',13),(43,'2023_07_29_044703_create_detail_po_customers_table',14),(44,'2023_07_29_044816_create_part_suppliers_table',14),(45,'2023_07_29_044905_create_part_customers_table',14),(46,'2023_07_29_064509_create_detail_prod_g2s_table',15),(47,'2023_07_30_133325_create_detail_prod_g1s_table',16),(48,'2023_07_31_102222_create_invoices_table',17);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `out_cashes`
--

DROP TABLE IF EXISTS `out_cashes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `out_cashes` (
  `id_out_cashes` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_bank` int(11) NOT NULL,
  `id_po` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `amount_out` bigint(20) NOT NULL,
  `tgl_out_cash` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_out_cashes`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `out_cashes`
--

LOCK TABLES `out_cashes` WRITE;
/*!40000 ALTER TABLE `out_cashes` DISABLE KEYS */;
INSERT INTO `out_cashes` VALUES (1,1,'1','pembelian_bahan_baku',1111,'2023-07-18','2023-07-23 02:09:46','2023-07-23 02:09:46');
/*!40000 ALTER TABLE `out_cashes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `part_customers`
--

DROP TABLE IF EXISTS `part_customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `part_customers` (
  `id_part_customer` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `part_number` varchar(255) NOT NULL,
  `part_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_part_customer`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `part_customers`
--

LOCK TABLES `part_customers` WRITE;
/*!40000 ALTER TABLE `part_customers` DISABLE KEYS */;
INSERT INTO `part_customers` VALUES (1,'P01','ADC12',NULL,NULL),(2,'PO2','ADT4',NULL,NULL),(3,'PO3','AC2C',NULL,NULL),(4,'PO4','AC2B',NULL,NULL),(5,'PO5','AC4B',NULL,NULL);
/*!40000 ALTER TABLE `part_customers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `part_suppliers`
--

DROP TABLE IF EXISTS `part_suppliers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `part_suppliers` (
  `id_part_supplier` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `part_number` varchar(255) NOT NULL,
  `part_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_part_supplier`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `part_suppliers`
--

LOCK TABLES `part_suppliers` WRITE;
/*!40000 ALTER TABLE `part_suppliers` DISABLE KEYS */;
INSERT INTO `part_suppliers` VALUES (6,'BM1','BM  AC  L J A',NULL,NULL),(7,'BM2','BM PLAT MN L J A',NULL,NULL),(8,'BM3','BM DC L J A',NULL,NULL),(9,'BM4','BM AC LEMBEK AIN',NULL,NULL),(10,'BM5','BM DC AIN',NULL,NULL),(11,'BM6','BM ADC IRFAN',NULL,NULL),(12,'BM7','BM LBK HASAN',NULL,NULL),(13,'BM8','BM ADC HASAN',NULL,NULL),(14,'BM9','BM AC2C',NULL,NULL),(15,'BM10','BM PRESS AC2C',NULL,NULL),(16,'BM11','BM PRESS ADC',NULL,NULL),(17,'BM12','BM ADC NG',NULL,NULL),(18,'BM13','INGOT AC2C NG ',NULL,NULL),(19,'AD01','SILICON',NULL,NULL),(20,'AD02','TEMBAGA',NULL,NULL),(21,'AD03','MAGNESIUM',NULL,NULL),(22,'AD04','AL TAB MN',NULL,NULL),(23,'M01','GRAM MACHINING TACI',NULL,NULL),(24,'M02','GRAM PISTON TACI',NULL,NULL),(25,'M03','GRAM SWASH TACI',NULL,NULL),(26,'M04','HOMEL DROSS TACI',NULL,NULL),(27,'M05','PART NG PISTON TACI',NULL,NULL),(28,'M06','DROSS ENKEI',NULL,NULL),(29,'M07','AL TUBE DENSO',NULL,NULL),(30,'M08','AL. PLATE DENSO',NULL,NULL),(31,'M09','AL.RDTR POTRAD DENSO',NULL,NULL),(32,'M10','KIRIKO AISIN',NULL,NULL),(33,'M11','DROSS AISIN',NULL,NULL),(34,'M12','ADVICS KIRIKO',NULL,NULL),(35,'M13','TEBAL BERSIH',NULL,NULL),(36,'M14','TEBAL KOTOR',NULL,NULL),(37,'M15','TEBAL BARU',NULL,NULL),(38,'M16','TEBAL BIASA',NULL,NULL),(39,'M17','PLAT BIASA',NULL,NULL),(40,'M18','PLAT BARU',NULL,NULL),(41,'M19','ALKOTEK',NULL,NULL),(42,'M20','PLAT PANEL',NULL,NULL),(43,'M21','PANCI',NULL,NULL),(44,'M22','SIKU A',NULL,NULL),(45,'M23','SIKU CAMPUR',NULL,NULL),(46,'M24','KALENG PRESS',NULL,NULL),(47,'M25','KRIPIK NKI',NULL,NULL),(48,'M26','GRAM NKI',NULL,NULL),(49,'M27','DROSS NKI',NULL,NULL),(50,'M28','VELG MOTOR',NULL,NULL),(51,'M29','VELG MOBIL',NULL,NULL),(52,'M30','KAWAT',NULL,NULL),(53,'M31','OFSET',NULL,NULL);
/*!40000 ALTER TABLE `part_suppliers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `po_customers`
--

DROP TABLE IF EXISTS `po_customers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `po_customers` (
  `id_po_customer` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `no_po_customer` varchar(255) NOT NULL,
  `id_customer` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tgl_po_customer` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_po_customer`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `po_customers`
--

LOCK TABLES `po_customers` WRITE;
/*!40000 ALTER TABLE `po_customers` DISABLE KEYS */;
INSERT INTO `po_customers` VALUES (3,'65000011','1','2023-07-28 21:56:56','2023-07-28 21:56:56','2023-07-29'),(4,'4353','2','2023-07-31 03:51:46','2023-07-31 03:51:46','2023-07-13');
/*!40000 ALTER TABLE `po_customers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `po_suppliers`
--

DROP TABLE IF EXISTS `po_suppliers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `po_suppliers` (
  `id_po` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_vendor` int(11) NOT NULL,
  `top` varchar(11) NOT NULL,
  `delivery_by` varchar(255) NOT NULL,
  `delivery_date` date NOT NULL,
  `quot_no` varchar(255) NOT NULL,
  `pr_no` varchar(255) NOT NULL,
  `vat` int(11) NOT NULL,
  `note_po` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `tgl_po` date DEFAULT NULL,
  PRIMARY KEY (`id_po`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `po_suppliers`
--

LOCK TABLES `po_suppliers` WRITE;
/*!40000 ALTER TABLE `po_suppliers` DISABLE KEYS */;
INSERT INTO `po_suppliers` VALUES (1,1,'cash','truk','2023-08-01','1','1',11,'-','2023-07-19 04:51:04','2023-07-19 06:37:07','2023-07-19'),(2,3,'hutang','truk','2023-08-02','6969','6989',2,NULL,'2023-07-19 04:59:35','2023-07-19 05:05:23','2023-07-22'),(3,1,'cash','ds','2023-07-19','ds','ds',11,'sd','2023-07-23 07:50:02','2023-07-23 07:50:02','2023-07-23');
/*!40000 ALTER TABLE `po_suppliers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prod_g1s`
--

DROP TABLE IF EXISTS `prod_g1s`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prod_g1s` (
  `id_prod_g1` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tgl_prod_g1` date NOT NULL,
  `lot_prod_g1` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_po_customer` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_prod_g1`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prod_g1s`
--

LOCK TABLES `prod_g1s` WRITE;
/*!40000 ALTER TABLE `prod_g1s` DISABLE KEYS */;
INSERT INTO `prod_g1s` VALUES (7,'2023-08-18','1A','2023-08-02 05:42:29','2023-08-02 05:42:29','3',NULL),(8,'2023-08-18','1A','2023-08-02 05:45:41','2023-08-02 05:45:41','3',NULL);
/*!40000 ALTER TABLE `prod_g1s` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prod_g2s`
--

DROP TABLE IF EXISTS `prod_g2s`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prod_g2s` (
  `id_prod_g2` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tgl_prod_g2` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `lot_prod_g2` varchar(100) DEFAULT NULL,
  `id_po_customer` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_prod_g2`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prod_g2s`
--

LOCK TABLES `prod_g2s` WRITE;
/*!40000 ALTER TABLE `prod_g2s` DISABLE KEYS */;
INSERT INTO `prod_g2s` VALUES (42,'2023-08-16','2023-08-02 05:05:14','2023-08-02 05:05:14','1A','3');
/*!40000 ALTER TABLE `prod_g2s` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `produks`
--

DROP TABLE IF EXISTS `produks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `produks` (
  `id_produk` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kode_produk` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_produk`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `produks`
--

LOCK TABLES `produks` WRITE;
/*!40000 ALTER TABLE `produks` DISABLE KEYS */;
INSERT INTO `produks` VALUES (2,'P01','ADC12',20000,'2023-07-18 07:49:33','2023-07-18 07:49:33'),(3,'P02','ADT4',300000,'2023-07-18 07:49:45','2023-07-18 07:49:45'),(4,'P03','AC2C',20000,'2023-07-18 07:50:18','2023-07-18 07:50:18'),(5,'P04','AC2B',30000,'2023-07-18 07:50:31','2023-07-18 07:50:31'),(6,'P05','AC4B',20000,'2023-07-18 07:50:41','2023-07-18 07:50:41');
/*!40000 ALTER TABLE `produks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sj_g1s`
--

DROP TABLE IF EXISTS `sj_g1s`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sj_g1s` (
  `id_sj_g1` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `qty_sj_g1` int(11) NOT NULL,
  `tgl_sj_g1` date NOT NULL,
  `id_truk` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_gudang_satu` int(11) DEFAULT NULL,
  `id_po_customer` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_sj_g1`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sj_g1s`
--

LOCK TABLES `sj_g1s` WRITE;
/*!40000 ALTER TABLE `sj_g1s` DISABLE KEYS */;
INSERT INTO `sj_g1s` VALUES (4,1111,'2023-07-13',1,'2023-07-31 03:33:03','2023-07-31 03:33:03',112,'3');
/*!40000 ALTER TABLE `sj_g1s` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sjs`
--

DROP TABLE IF EXISTS `sjs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sjs` (
  `id_sj` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_gudang_dua` int(11) NOT NULL,
  `qty_sj` int(11) NOT NULL,
  `tgl_sj` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_truk` int(11) NOT NULL,
  PRIMARY KEY (`id_sj`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sjs`
--

LOCK TABLES `sjs` WRITE;
/*!40000 ALTER TABLE `sjs` DISABLE KEYS */;
INSERT INTO `sjs` VALUES (1,7,100,'2023-07-20','2023-07-18 20:17:03','2023-07-18 20:17:03',3),(2,32,10,'2023-07-26','2023-07-21 22:49:23','2023-07-21 22:49:23',1);
/*!40000 ALTER TABLE `sjs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sops`
--

DROP TABLE IF EXISTS `sops`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sops` (
  `id_sop` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nama_sop` varchar(255) NOT NULL,
  `file_sop` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_sop`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sops`
--

LOCK TABLES `sops` WRITE;
/*!40000 ALTER TABLE `sops` DISABLE KEYS */;
INSERT INTO `sops` VALUES (1,'dssf','dssf.pdf','2023-07-24 06:51:00','2023-07-24 06:51:00'),(2,'fdsf','fdsf.pdf','2023-07-24 07:02:49','2023-07-24 07:02:49'),(3,'sop22','sop22.pdf','2023-07-24 07:03:04','2023-07-24 07:03:04');
/*!40000 ALTER TABLE `sops` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stog1s`
--

DROP TABLE IF EXISTS `stog1s`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stog1s` (
  `id_sto_g1` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `part_no` varchar(255) NOT NULL,
  `qty_sto` int(11) NOT NULL,
  `tgl_sto` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_sto_g1`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stog1s`
--

LOCK TABLES `stog1s` WRITE;
/*!40000 ALTER TABLE `stog1s` DISABLE KEYS */;
INSERT INTO `stog1s` VALUES (1,'P01',100,'2023-07-26','2023-07-25 06:31:24','2023-07-25 06:31:24'),(2,'P02',100,'2023-07-26','2023-07-25 06:31:24','2023-07-25 06:31:24'),(3,'P03',100,'2023-07-26','2023-07-25 06:31:24','2023-07-25 06:31:24'),(4,'P04',500,'2023-07-26','2023-07-25 06:31:24','2023-07-25 06:31:24'),(5,'P05',500,'2023-07-26','2023-07-25 06:31:24','2023-07-25 06:31:24'),(6,'BM1',217,'2023-07-26','2023-07-25 06:31:24','2023-07-25 06:31:24'),(7,'BM2',422,'2023-07-26','2023-07-25 06:31:24','2023-07-25 06:31:24'),(8,'BM3',111,'2023-07-26','2023-07-25 06:31:24','2023-07-25 06:31:24'),(9,'BM4',413,'2023-07-26','2023-07-25 06:31:24','2023-07-25 06:31:24'),(10,'BM5',679,'2023-07-26','2023-07-25 06:31:24','2023-07-25 06:31:24'),(11,'BM6',785,'2023-07-26','2023-07-25 06:31:24','2023-07-25 06:31:24'),(12,'BM7',115,'2023-07-26','2023-07-25 06:31:25','2023-07-25 06:31:25'),(13,'BM8',105,'2023-07-26','2023-07-25 06:31:25','2023-07-25 06:31:25'),(14,'BM9',892,'2023-07-26','2023-07-25 06:31:25','2023-07-25 06:31:25'),(15,'BM10',350,'2023-07-26','2023-07-25 06:31:25','2023-07-25 06:31:25'),(16,'BM11',153,'2023-07-26','2023-07-25 06:31:25','2023-07-25 06:31:25'),(17,'BM12',554,'2023-07-26','2023-07-25 06:31:25','2023-07-25 06:31:25'),(18,'BM13',866,'2023-07-26','2023-07-25 06:31:25','2023-07-25 06:31:25'),(19,'AD01',362,'2023-07-26','2023-07-25 06:31:25','2023-07-25 06:31:25'),(20,'AD02',818,'2023-07-26','2023-07-25 06:31:25','2023-07-25 06:31:25'),(21,'AD03',444,'2023-07-26','2023-07-25 06:31:25','2023-07-25 06:31:25'),(22,'AD04',832,'2023-07-26','2023-07-25 06:31:25','2023-07-25 06:31:25');
/*!40000 ALTER TABLE `stog1s` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stog2s`
--

DROP TABLE IF EXISTS `stog2s`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stog2s` (
  `id_sto_g2` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `part_no` varchar(255) NOT NULL,
  `qty_sto` int(11) NOT NULL,
  `tgl_sto` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_sto_g2`)
) ENGINE=InnoDB AUTO_INCREMENT=133 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stog2s`
--

LOCK TABLES `stog2s` WRITE;
/*!40000 ALTER TABLE `stog2s` DISABLE KEYS */;
INSERT INTO `stog2s` VALUES (1,'M01',755,'2023-07-25','2023-07-25 05:46:15','2023-07-25 05:46:15'),(2,'M02',770,'2023-07-25','2023-07-25 05:46:15','2023-07-25 05:46:15'),(3,'M03',892,'2023-07-25','2023-07-25 05:46:15','2023-07-25 05:46:15'),(4,'M04',163,'2023-07-25','2023-07-25 05:46:15','2023-07-25 05:46:15'),(5,'M05',932,'2023-07-25','2023-07-25 05:46:15','2023-07-25 05:46:15'),(6,'M06',989,'2023-07-25','2023-07-25 05:46:15','2023-07-25 05:46:15'),(7,'M07',781,'2023-07-25','2023-07-25 05:46:15','2023-07-25 05:46:15'),(8,'M08',225,'2023-07-25','2023-07-25 05:46:15','2023-07-25 05:46:15'),(9,'M09',369,'2023-07-25','2023-07-25 05:46:15','2023-07-25 05:46:15'),(10,'M10',252,'2023-07-25','2023-07-25 05:46:15','2023-07-25 05:46:15'),(11,'M11',391,'2023-07-25','2023-07-25 05:46:15','2023-07-25 05:46:15'),(12,'M12',205,'2023-07-25','2023-07-25 05:46:15','2023-07-25 05:46:15'),(13,'M13',385,'2023-07-25','2023-07-25 05:46:15','2023-07-25 05:46:15'),(14,'M14',467,'2023-07-25','2023-07-25 05:46:15','2023-07-25 05:46:15'),(15,'M15',527,'2023-07-25','2023-07-25 05:46:15','2023-07-25 05:46:15'),(16,'M16',312,'2023-07-25','2023-07-25 05:46:15','2023-07-25 05:46:15'),(17,'M17',567,'2023-07-25','2023-07-25 05:46:15','2023-07-25 05:46:15'),(18,'M18',748,'2023-07-25','2023-07-25 05:46:15','2023-07-25 05:46:15'),(19,'M19',429,'2023-07-25','2023-07-25 05:46:15','2023-07-25 05:46:15'),(20,'M20',303,'2023-07-25','2023-07-25 05:46:15','2023-07-25 05:46:15'),(21,'M21',301,'2023-07-25','2023-07-25 05:46:15','2023-07-25 05:46:15'),(22,'M22',923,'2023-07-25','2023-07-25 05:46:15','2023-07-25 05:46:15'),(23,'M23',930,'2023-07-25','2023-07-25 05:46:15','2023-07-25 05:46:15'),(24,'M24',545,'2023-07-25','2023-07-25 05:46:15','2023-07-25 05:46:15'),(25,'M25',624,'2023-07-25','2023-07-25 05:46:15','2023-07-25 05:46:15'),(26,'M26',260,'2023-07-25','2023-07-25 05:46:15','2023-07-25 05:46:15'),(27,'M27',546,'2023-07-25','2023-07-25 05:46:15','2023-07-25 05:46:15'),(28,'M28',751,'2023-07-25','2023-07-25 05:46:15','2023-07-25 05:46:15'),(29,'M29',483,'2023-07-25','2023-07-25 05:46:15','2023-07-25 05:46:15'),(30,'M30',191,'2023-07-25','2023-07-25 05:46:15','2023-07-25 05:46:15'),(31,'M31',908,'2023-07-25','2023-07-25 05:46:15','2023-07-25 05:46:15'),(32,'BM1',217,'2023-07-25','2023-07-25 05:46:15','2023-07-25 05:46:15'),(33,'BM2',422,'2023-07-25','2023-07-25 05:46:15','2023-07-25 05:46:15'),(34,'BM3',111,'2023-07-25','2023-07-25 05:46:15','2023-07-25 05:46:15'),(35,'BM4',413,'2023-07-25','2023-07-25 05:46:15','2023-07-25 05:46:15'),(36,'BM5',679,'2023-07-25','2023-07-25 05:46:15','2023-07-25 05:46:15'),(37,'BM6',785,'2023-07-25','2023-07-25 05:46:15','2023-07-25 05:46:15'),(38,'BM7',115,'2023-07-25','2023-07-25 05:46:15','2023-07-25 05:46:15'),(39,'BM8',105,'2023-07-25','2023-07-25 05:46:15','2023-07-25 05:46:15'),(40,'BM9',892,'2023-07-25','2023-07-25 05:46:15','2023-07-25 05:46:15'),(41,'BM10',350,'2023-07-25','2023-07-25 05:46:15','2023-07-25 05:46:15'),(42,'BM11',153,'2023-07-25','2023-07-25 05:46:15','2023-07-25 05:46:15'),(43,'BM12',554,'2023-07-25','2023-07-25 05:46:15','2023-07-25 05:46:15'),(44,'BM13',866,'2023-07-25','2023-07-25 05:46:15','2023-07-25 05:46:15'),(45,'M01',696,'2023-07-31','2023-07-25 05:51:11','2023-07-25 05:51:11'),(46,'M02',770,'2023-07-31','2023-07-25 05:51:11','2023-07-25 05:51:11'),(47,'M03',892,'2023-07-31','2023-07-25 05:51:11','2023-07-25 05:51:11'),(48,'M04',163,'2023-07-31','2023-07-25 05:51:11','2023-07-25 05:51:11'),(49,'M05',932,'2023-07-31','2023-07-25 05:51:11','2023-07-25 05:51:11'),(50,'M06',989,'2023-07-31','2023-07-25 05:51:11','2023-07-25 05:51:11'),(51,'M07',781,'2023-07-31','2023-07-25 05:51:11','2023-07-25 05:51:11'),(52,'M08',225,'2023-07-31','2023-07-25 05:51:11','2023-07-25 05:51:11'),(53,'M09',369,'2023-07-31','2023-07-25 05:51:11','2023-07-25 05:51:11'),(54,'M10',252,'2023-07-31','2023-07-25 05:51:11','2023-07-25 05:51:11'),(55,'M11',391,'2023-07-31','2023-07-25 05:51:11','2023-07-25 05:51:11'),(56,'M12',205,'2023-07-31','2023-07-25 05:51:11','2023-07-25 05:51:11'),(57,'M13',385,'2023-07-31','2023-07-25 05:51:11','2023-07-25 05:51:11'),(58,'M14',467,'2023-07-31','2023-07-25 05:51:11','2023-07-25 05:51:11'),(59,'M15',527,'2023-07-31','2023-07-25 05:51:11','2023-07-25 05:51:11'),(60,'M16',312,'2023-07-31','2023-07-25 05:51:11','2023-07-25 05:51:11'),(61,'M17',567,'2023-07-31','2023-07-25 05:51:11','2023-07-25 05:51:11'),(62,'M18',748,'2023-07-31','2023-07-25 05:51:11','2023-07-25 05:51:11'),(63,'M19',429,'2023-07-31','2023-07-25 05:51:11','2023-07-25 05:51:11'),(64,'M20',303,'2023-07-31','2023-07-25 05:51:11','2023-07-25 05:51:11'),(65,'M21',301,'2023-07-31','2023-07-25 05:51:11','2023-07-25 05:51:11'),(66,'M22',923,'2023-07-31','2023-07-25 05:51:11','2023-07-25 05:51:11'),(67,'M23',930,'2023-07-31','2023-07-25 05:51:11','2023-07-25 05:51:11'),(68,'M24',545,'2023-07-31','2023-07-25 05:51:11','2023-07-25 05:51:11'),(69,'M25',624,'2023-07-31','2023-07-25 05:51:11','2023-07-25 05:51:11'),(70,'M26',260,'2023-07-31','2023-07-25 05:51:11','2023-07-25 05:51:11'),(71,'M27',546,'2023-07-31','2023-07-25 05:51:11','2023-07-25 05:51:11'),(72,'M28',751,'2023-07-31','2023-07-25 05:51:11','2023-07-25 05:51:11'),(73,'M29',483,'2023-07-31','2023-07-25 05:51:11','2023-07-25 05:51:11'),(74,'M30',191,'2023-07-31','2023-07-25 05:51:11','2023-07-25 05:51:11'),(75,'M31',908,'2023-07-31','2023-07-25 05:51:11','2023-07-25 05:51:11'),(76,'BM1',217,'2023-07-31','2023-07-25 05:51:11','2023-07-25 05:51:11'),(77,'BM2',422,'2023-07-31','2023-07-25 05:51:11','2023-07-25 05:51:11'),(78,'BM3',111,'2023-07-31','2023-07-25 05:51:11','2023-07-25 05:51:11'),(79,'BM4',413,'2023-07-31','2023-07-25 05:51:11','2023-07-25 05:51:11'),(80,'BM5',679,'2023-07-31','2023-07-25 05:51:11','2023-07-25 05:51:11'),(81,'BM6',785,'2023-07-31','2023-07-25 05:51:11','2023-07-25 05:51:11'),(82,'BM7',115,'2023-07-31','2023-07-25 05:51:11','2023-07-25 05:51:11'),(83,'BM8',105,'2023-07-31','2023-07-25 05:51:11','2023-07-25 05:51:11'),(84,'BM9',892,'2023-07-31','2023-07-25 05:51:11','2023-07-25 05:51:11'),(85,'BM10',350,'2023-07-31','2023-07-25 05:51:11','2023-07-25 05:51:11'),(86,'BM11',153,'2023-07-31','2023-07-25 05:51:11','2023-07-25 05:51:11'),(87,'BM12',554,'2023-07-31','2023-07-25 05:51:11','2023-07-25 05:51:11'),(88,'BM13',866,'2023-07-31','2023-07-25 05:51:11','2023-07-25 05:51:11');
/*!40000 ALTER TABLE `stog2s` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `truks`
--

DROP TABLE IF EXISTS `truks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `truks` (
  `id_truk` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kode_truk` varchar(255) NOT NULL,
  `plat_no` varchar(255) NOT NULL,
  `driver` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_truk`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `truks`
--

LOCK TABLES `truks` WRITE;
/*!40000 ALTER TABLE `truks` DISABLE KEYS */;
INSERT INTO `truks` VALUES (1,'T01','T 8956 EH','WARINTO','2023-07-18 08:25:03','2023-07-18 08:25:03'),(2,'T02','B 9947 FQA','SANTANI','2023-07-18 08:25:17','2023-07-18 08:25:17'),(3,'T03','B 9420 FQA','TRISNO','2023-07-18 08:25:29','2023-07-18 08:25:29'),(4,'T04','B 9421 FQA','ASIRUDIN','2023-07-18 08:25:39','2023-07-18 08:25:39'),(5,'T05','B 9028 DX','SAMINGIN','2023-07-18 08:25:52','2023-07-18 08:25:52'),(6,'T06','T 8661 EB','SUROSO','2023-07-18 08:26:02','2023-07-18 08:26:02'),(7,'T07','T 8662 EB','ANDI','2023-07-18 08:26:13','2023-07-18 08:26:13'),(8,'T08','T 8523 HJ','SAMINGIN','2023-07-18 08:26:22','2023-07-18 08:26:22'),(9,'T09','B 9851 SY','RANTO','2023-07-18 08:26:32','2023-07-18 08:26:32');
/*!40000 ALTER TABLE `truks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usage_g1s`
--

DROP TABLE IF EXISTS `usage_g1s`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usage_g1s` (
  `id_usage_g1` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_base_metal` int(11) NOT NULL,
  `qty_usage_g1` int(11) NOT NULL,
  `tgl_usage_g1` date NOT NULL,
  `lot_usage_g1` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_usage_g1`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usage_g1s`
--

LOCK TABLES `usage_g1s` WRITE;
/*!40000 ALTER TABLE `usage_g1s` DISABLE KEYS */;
INSERT INTO `usage_g1s` VALUES (1,1,10,'2023-07-19','LOTE','2023-07-22 01:50:36','2023-07-22 01:50:36'),(2,1,10,'2023-07-19','LOTE','2023-07-22 01:51:18','2023-07-22 01:51:18'),(3,1,10,'2023-07-19','LOTE','2023-07-22 01:51:32','2023-07-22 01:51:32');
/*!40000 ALTER TABLE `usage_g1s` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usage_g2s`
--

DROP TABLE IF EXISTS `usage_g2s`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usage_g2s` (
  `id_usage_g2` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_material` int(11) NOT NULL,
  `qty_usage_g2` int(11) NOT NULL,
  `tgl_usage_g2` date NOT NULL,
  `lot_usage_g2` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_usage_g2`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usage_g2s`
--

LOCK TABLES `usage_g2s` WRITE;
/*!40000 ALTER TABLE `usage_g2s` DISABLE KEYS */;
INSERT INTO `usage_g2s` VALUES (1,1,100,'2023-07-28','1A','2023-07-21 22:40:49','2023-07-21 22:40:49');
/*!40000 ALTER TABLE `usage_g2s` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','admin@gmail.com','$2y$10$aFTiSS/YCc6Nnq1IThuLeebM7gv7T/4Uc1aK4aSJbOomSJJX//9gu','admin','RgbrbX9WE6dl0u37S8j45RhPdRmJ6VuXJn5gZQHM11Bv7rVoPnj2qJgyOrqo',NULL,'2023-07-22 00:33:29');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vendors`
--

DROP TABLE IF EXISTS `vendors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vendors` (
  `id_vendor` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kode_vendor` varchar(255) NOT NULL,
  `nama_vendor` varchar(255) NOT NULL,
  `alamat_vendor` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_vendor`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vendors`
--

LOCK TABLES `vendors` WRITE;
/*!40000 ALTER TABLE `vendors` DISABLE KEYS */;
INSERT INTO `vendors` VALUES (1,'S01','PT. MITRA PRIMA AGUNG','JAKARTA','2023-07-18 08:30:01','2023-07-18 09:31:03'),(2,'S02','PT. MAKMUR META GRAHA','JAKARTA','2023-07-18 08:30:14','2023-07-18 08:30:14'),(3,'S03','PT. METALURGI MITRA ABADI','JAKARTA','2023-07-18 08:30:29','2023-07-18 08:30:29'),(4,'S04','PT. SENTOSA METALURGI','JAKARTA','2023-07-18 08:30:39','2023-07-18 08:30:39'),(5,'S05','PT. WILISINDOMAS INDAH MAKMUR','JAKARTA','2023-07-18 08:30:50','2023-07-18 08:30:50'),(6,'S06','PT. SAMATOR GAS INDUSTRI','JAKARTA','2023-07-18 08:31:01','2023-07-18 08:31:01'),(7,'S07','PT. GAS NUSANTARA','JAKARTA','2023-07-18 08:31:12','2023-07-18 08:31:12'),(8,'S08','PT. ALLOY INDAH NUSANTARA','BANDUNG','2023-07-18 08:31:24','2023-07-18 08:31:24'),(9,'S09','PT. LOGAM JAYA ABADI','BEKASI','2023-07-18 08:31:33','2023-07-18 08:31:33');
/*!40000 ALTER TABLE `vendors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'sap'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-08-03  4:43:47
