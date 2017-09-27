-- MySQL dump 10.15  Distrib 10.0.31-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: A2Server
-- ------------------------------------------------------
-- Server version	10.0.31-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Current Database: `A2Server`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `A2Server` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `A2Server`;

--
-- Table structure for table `Parameters`
--

DROP TABLE IF EXISTS `Parameters`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Parameters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parameters_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parameters_value` varchar(1024) COLLATE utf8_unicode_ci NOT NULL,
  `parameters_label` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `parameters_category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Parameters`
--

LOCK TABLES `Parameters` WRITE;
/*!40000 ALTER TABLE `Parameters` DISABLE KEYS */;
INSERT INTO `Parameters` VALUES (1,'Menus','Acc/Lis/Ajo/Par','Menus','Principal');
/*!40000 ALTER TABLE `Parameters` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categories_id_parent` int(11) DEFAULT NULL,
  `categories_label` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `categories_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_3AF34668446AA303` (`categories_id_parent`),
  CONSTRAINT `FK_3AF34668446AA303` FOREIGN KEY (`categories_id_parent`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,NULL,'Tes','Test'),(2,1,'Sou','Sous-test'),(3,NULL,'Boi','les boissons'),(4,NULL,'Men','cartes et menus'),(7,3,'Apé','Apéritifs');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `content_restaurant`
--

DROP TABLE IF EXISTS `content_restaurant`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `content_restaurant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `color_background` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `color_menu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `color_dots` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `color_logo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `content_restaurant`
--

LOCK TABLES `content_restaurant` WRITE;
/*!40000 ALTER TABLE `content_restaurant` DISABLE KEYS */;
INSERT INTO `content_restaurant` VALUES (1,'6EFF5F','7EADFF','FF64D0','FF9931'),(2,'6BFF3E','5A40FF','225DFF','FF7D31');
/*!40000 ALTER TABLE `content_restaurant` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contentrestaurant`
--

DROP TABLE IF EXISTS `contentrestaurant`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contentrestaurant` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `color_background` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `color_menu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `color_dots` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `color_logo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contentrestaurant`
--

LOCK TABLES `contentrestaurant` WRITE;
/*!40000 ALTER TABLE `contentrestaurant` DISABLE KEYS */;
INSERT INTO `contentrestaurant` VALUES (1,'5CFF72','CDFF69','9F4AFF','FF7B84'),(2,'656565','FFFFFF','FFFFFF','A5467C');
/*!40000 ALTER TABLE `contentrestaurant` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `display_date`
--

DROP TABLE IF EXISTS `display_date`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `display_date` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `date_files_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_21F4DA3B60D33289` (`date_files_id`),
  CONSTRAINT `FK_21F4DA3B60D33289` FOREIGN KEY (`date_files_id`) REFERENCES `files` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `display_date`
--

LOCK TABLES `display_date` WRITE;
/*!40000 ALTER TABLE `display_date` DISABLE KEYS */;
INSERT INTO `display_date` VALUES (1,'2017-08-31','2017-09-30',1),(2,'2017-08-31','2017-09-30',2),(3,'2017-08-31','2017-09-30',3),(4,'2017-09-01','2017-10-01',4),(5,'2017-09-01','2017-10-01',5),(6,'2017-09-22','2017-10-22',6),(7,'2017-09-22','2017-10-22',7),(8,'2017-09-22','2017-10-22',8),(9,'2017-09-22','2017-10-22',9),(10,'2017-09-22','2017-10-22',10),(11,'2017-09-25','2017-10-25',11),(12,'2017-09-25','2017-10-25',12);
/*!40000 ALTER TABLE `display_date` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `files`
--

DROP TABLE IF EXISTS `files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categories_id` int(11) NOT NULL,
  `files_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `files_date_creation` date NOT NULL,
  `files_display_type` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_6354059A21214B7` (`categories_id`),
  CONSTRAINT `FK_6354059A21214B7` FOREIGN KEY (`categories_id`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `files`
--

LOCK TABLES `files` WRITE;
/*!40000 ALTER TABLE `files` DISABLE KEYS */;
INSERT INTO `files` VALUES (1,2,'plop','2017-08-31','t','2017-08-31 13:05:45'),(2,2,'Screenshot_1492513983.png','2017-08-31','t','2017-08-31 13:12:38'),(3,2,'59a82751da8fb_Screenshot_1492513983.png','2017-08-31','t','2017-08-31 15:12:17'),(4,2,'59a9363faab6b_Screenshot_1492513983.png','2017-09-01','t','2017-09-01 10:28:15'),(5,2,'59a93d6f315d4_Screenshot_1492513983.png','2017-09-01','t','2017-09-01 10:58:55'),(6,2,'59c53899cb5d7_chateau.jpg','2017-09-22','t','2017-09-22 16:21:45'),(7,2,'59c539185abe4_Screenshot_20170210_121348.png','2017-09-22','t','2017-09-22 16:23:52'),(8,7,'59c53926900ca_chateau.jpg','2017-09-22','t','2017-09-22 16:24:06'),(9,7,'59c53934e003c_Releve_de_notes.pdf','2017-09-22','t','2017-09-22 16:24:20'),(10,7,'59c53a83d1bef_BF_CCI_Angers_120917.pdf','2017-09-22','t','2017-09-22 16:29:55'),(11,7,'59c8c239aedc9_BF_Admin_MLH_070217.pdf','2017-09-25','t','2017-09-25 08:45:45'),(12,7,'59c8c28b5f846_Devis_rmc_averty_dalle_PdC.pdf','2017-09-25','t','2017-09-25 08:47:07');
/*!40000 ALTER TABLE `files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `home4columns`
--

DROP TABLE IF EXISTS `home4columns`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `home4columns` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categories_id_left` int(11) NOT NULL,
  `categories_id_left_center` int(11) NOT NULL,
  `categories_id_right_center` int(11) NOT NULL,
  `categories_id_right` int(11) NOT NULL,
  `image_left` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image_left_center` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image_right_center` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image_right` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `text_bottom` varchar(1024) COLLATE utf8_unicode_ci NOT NULL,
  `image_logo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `color_categories` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `color_border_categories` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `color_background` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `color_logo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_946FB702D94D2ACA` (`categories_id_left`),
  KEY `IDX_946FB7028CA680D9` (`categories_id_left_center`),
  KEY `IDX_946FB702941ADC13` (`categories_id_right_center`),
  KEY `IDX_946FB7028CB19D1D` (`categories_id_right`),
  CONSTRAINT `FK_946FB7028CA680D9` FOREIGN KEY (`categories_id_left_center`) REFERENCES `categories` (`id`),
  CONSTRAINT `FK_946FB7028CB19D1D` FOREIGN KEY (`categories_id_right`) REFERENCES `categories` (`id`),
  CONSTRAINT `FK_946FB702941ADC13` FOREIGN KEY (`categories_id_right_center`) REFERENCES `categories` (`id`),
  CONSTRAINT `FK_946FB702D94D2ACA` FOREIGN KEY (`categories_id_left`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `home4columns`
--

LOCK TABLES `home4columns` WRITE;
/*!40000 ALTER TABLE `home4columns` DISABLE KEYS */;
INSERT INTO `home4columns` VALUES (1,3,4,1,4,'images/theme/59c26e50f3c59_bora-bora-rhum-cocktail-2469.jpg','images/theme/59c26e50f3e98_couple en resto servir vin (Copier).jpg','images/theme/59c26e50f3fad_palet-croquant-de-la.jpg','images/theme/59c26e50f40a9_san-andrea.jpg','plop','images/theme/59c26e50f419d_logo_a2display_couleur_sans_fond_grand.png','4080FF','5FFFEF','48FF9D','FF69E1','2017-09-20 13:34:08');
/*!40000 ALTER TABLE `home4columns` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `home_4__columns`
--

DROP TABLE IF EXISTS `home_4__columns`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `home_4__columns` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categories_id_left` int(11) NOT NULL,
  `categories_id_left_center` int(11) NOT NULL,
  `categories_id_right_center` int(11) NOT NULL,
  `categories_id_right` int(11) NOT NULL,
  `image_left` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image_left_center` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image_right_center` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image_right` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `text_bottom` varchar(1024) COLLATE utf8_unicode_ci NOT NULL,
  `image_logo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `color_categories` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `color_border_categories` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `color_background` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `color_logo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_E3126BC0D94D2ACA` (`categories_id_left`),
  KEY `IDX_E3126BC08CA680D9` (`categories_id_left_center`),
  KEY `IDX_E3126BC0941ADC13` (`categories_id_right_center`),
  KEY `IDX_E3126BC08CB19D1D` (`categories_id_right`),
  CONSTRAINT `FK_E3126BC08CA680D9` FOREIGN KEY (`categories_id_left_center`) REFERENCES `categories` (`id`),
  CONSTRAINT `FK_E3126BC08CB19D1D` FOREIGN KEY (`categories_id_right`) REFERENCES `categories` (`id`),
  CONSTRAINT `FK_E3126BC0941ADC13` FOREIGN KEY (`categories_id_right_center`) REFERENCES `categories` (`id`),
  CONSTRAINT `FK_E3126BC0D94D2ACA` FOREIGN KEY (`categories_id_left`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `home_4__columns`
--

LOCK TABLES `home_4__columns` WRITE;
/*!40000 ALTER TABLE `home_4__columns` DISABLE KEYS */;
/*!40000 ALTER TABLE `home_4__columns` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `home_4_columns`
--

DROP TABLE IF EXISTS `home_4_columns`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `home_4_columns` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categories_id_left` int(11) NOT NULL,
  `categories_id_left_center` int(11) NOT NULL,
  `categories_id_right_center` int(11) NOT NULL,
  `categories_id_right` int(11) NOT NULL,
  `image_left` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image_left_center` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image_right_center` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image_right` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `text_bottom` varchar(1024) COLLATE utf8_unicode_ci NOT NULL,
  `image_logo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `color_categories` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `color_border_categories` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `color_background` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `color_logo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_56A40297D94D2ACA` (`categories_id_left`),
  KEY `IDX_56A402978CA680D9` (`categories_id_left_center`),
  KEY `IDX_56A40297941ADC13` (`categories_id_right_center`),
  KEY `IDX_56A402978CB19D1D` (`categories_id_right`),
  CONSTRAINT `FK_56A402978CA680D9` FOREIGN KEY (`categories_id_left_center`) REFERENCES `categories` (`id`),
  CONSTRAINT `FK_56A402978CB19D1D` FOREIGN KEY (`categories_id_right`) REFERENCES `categories` (`id`),
  CONSTRAINT `FK_56A40297941ADC13` FOREIGN KEY (`categories_id_right_center`) REFERENCES `categories` (`id`),
  CONSTRAINT `FK_56A40297D94D2ACA` FOREIGN KEY (`categories_id_left`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `home_4_columns`
--

LOCK TABLES `home_4_columns` WRITE;
/*!40000 ALTER TABLE `home_4_columns` DISABLE KEYS */;
INSERT INTO `home_4_columns` VALUES (1,3,4,3,1,'images/theme/59c264e84d1ef_bora-bora-rhum-cocktail-2469.jpg','images/theme/59c264e84d36e_couple en resto servir vin (Copier).jpg','images/theme/59c264e84d4df_palet-croquant-de-la.jpg','images/theme/59c264e84d6aa_san-andrea.jpg','plop','images/theme/59c264e84d7b2_logo_a2display_couleur_sans_fond_grand.png','8220FF','89FF46','55C0FF','FF3C7C','2017-09-20 12:54:00');
/*!40000 ALTER TABLE `home_4_columns` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menus_label` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `menus_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `menus_path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `menus_icon` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `menus_parent` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menus`
--

LOCK TABLES `menus` WRITE;
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;
INSERT INTO `menus` VALUES (1,'Acc','Accueil','accueil','fa-bars',''),(2,'Ajo','Ajout de Fichiers','add_file','fa-file-text-o',''),(3,'Lis','Liste','list_files','fa-file-text-o',''),(4,'Par','Paramètres','settings','fa-files-o','');
/*!40000 ALTER TABLE `menus` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-09-25 11:49:49
