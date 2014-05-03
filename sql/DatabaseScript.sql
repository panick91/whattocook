CREATE DATABASE  IF NOT EXISTS `whattocook` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `whattocook`;
-- MySQL dump 10.13  Distrib 5.6.13, for Win32 (x86)
--
-- Host: 127.0.0.1    Database: whattocook
-- ------------------------------------------------------
-- Server version	5.6.12-log

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
-- Table structure for table `ingredients`
--

DROP TABLE IF EXISTS `ingredients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ingredients` (
  `ingredientId` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(100) DEFAULT NULL,
  `nutritionalValue` varchar(100) DEFAULT 'no data',
  `imageNamePart` varchar(255) DEFAULT 'Placeholder',
  PRIMARY KEY (`ingredientId`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ingredients`
--

LOCK TABLES `ingredients` WRITE;
/*!40000 ALTER TABLE `ingredients` DISABLE KEYS */;
INSERT INTO `ingredients` VALUES (1,'Leek','no data','lauch'),(2,'Tomato','no data','tomate'),(3,'Cheese','no data','Placeholder'),(4,'Spaghetti','no data','Placeholder'),(5,'Whitebread','no data','Placeholder'),(6,'Iceberg salad','no data','Placeholder'),(7,'Salami','no data','Placeholder'),(8,'Angus Steak','no data','Placeholder'),(9,'T-Bone Steak','no data','Placeholder'),(10,'Rice','no data','Placeholder'),(11,'Basmati-Rice','no data','Placeholder'),(12,'Basil','no data','Placeholder'),(13,'Lasagna sheets','no data','Placeholder'),(14,'Beef','no data','Placeholder');
/*!40000 ALTER TABLE `ingredients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `receipts`
--

DROP TABLE IF EXISTS `receipts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `receipts` (
  `receiptId` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `instructions` text,
  `difficulty` int(11) DEFAULT NULL,
  `imagePartName` varchar(255) DEFAULT 'Placeholder',
  `duration` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`receiptId`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `receipts`
--

LOCK TABLES `receipts` WRITE;
/*!40000 ALTER TABLE `receipts` DISABLE KEYS */;
INSERT INTO `receipts` VALUES (2,'Spaghetti Napoli','test',2,'spaghetti%20Napoli','15 Minutes'),(3,'Lasagne','test',4,'Placeholder','45 Minutes'),(4,'Ravioli','test',1,'Placeholder','10 Minutes'),(5,'Riz Casimir','test',2,'Placeholder','30 Minutes');
/*!40000 ALTER TABLE `receipts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `receipts2ingredients`
--

DROP TABLE IF EXISTS `receipts2ingredients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `receipts2ingredients` (
  `receipts2ingredientsId` int(11) NOT NULL AUTO_INCREMENT,
  `receiptId` int(11) NOT NULL,
  `ingredientId` int(11) NOT NULL,
  PRIMARY KEY (`receipts2ingredientsId`),
  KEY `FK_receipts2ingredients_receipts_idx` (`receiptId`),
  KEY `FK_receipts2ingredients_ingredients_idx` (`ingredientId`),
  CONSTRAINT `FK_receipts2ingredients_ingredients` FOREIGN KEY (`ingredientId`) REFERENCES `ingredients` (`ingredientId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_receipts2ingredients_receipts` FOREIGN KEY (`receiptId`) REFERENCES `receipts` (`receiptId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `receipts2ingredients`
--

LOCK TABLES `receipts2ingredients` WRITE;
/*!40000 ALTER TABLE `receipts2ingredients` DISABLE KEYS */;
INSERT INTO `receipts2ingredients` VALUES (10,2,2),(11,2,4),(12,2,12),(13,3,13),(14,3,2),(15,4,2),(16,4,14);
/*!40000 ALTER TABLE `receipts2ingredients` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-05-03 16:26:46
