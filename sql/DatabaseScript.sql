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
-- Table structure for table `importantadvices`
--

DROP TABLE IF EXISTS `importantadvices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `importantadvices` (
  `adviceId` int(11) NOT NULL AUTO_INCREMENT,
  `advice` varchar(255) DEFAULT NULL,
  `imagePartName` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`adviceId`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `importantadvices`
--

LOCK TABLES `importantadvices` WRITE;
/*!40000 ALTER TABLE `importantadvices` DISABLE KEYS */;
INSERT INTO `importantadvices` VALUES (1,'This menu contains treenuts!','treenut'),(2,'This menu contains dairy!','dairy'),(3,'This menu contains eggs!','egg'),(4,'This menu contains shellfish!','shellfish'),(5,'This menu contains seafood!','seafood'),(6,'This menu contains soy!','soy'),(7,'This menu contains wheat!','wheat'),(8,'This menu contains peanut!','peanut'),(9,'This menu is vegetarian.','vegetarian'),(10,'This menu has little fat.','fat'),(11,'This menu has little calories.','calories'),(12,'This menu is healthy.','healthy'),(13,'This menu is gluten free.','gluten');
/*!40000 ALTER TABLE `importantadvices` ENABLE KEYS */;
UNLOCK TABLES;

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
-- Table structure for table `ratings`
--

DROP TABLE IF EXISTS `ratings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ratings` (
  `ratingsId` int(11) NOT NULL AUTO_INCREMENT,
  `rating` int(11) NOT NULL,
  `receiptId` int(11) NOT NULL,
  PRIMARY KEY (`ratingsId`),
  KEY `fk_receipt_rating_idx` (`receiptId`),
  CONSTRAINT `fk_receipt_rating` FOREIGN KEY (`receiptId`) REFERENCES `receipts` (`receiptId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ratings`
--

LOCK TABLES `ratings` WRITE;
/*!40000 ALTER TABLE `ratings` DISABLE KEYS */;
INSERT INTO `ratings` VALUES (1,3,2),(2,3,2),(3,3,2),(4,3,2),(5,3,2),(6,3,2),(7,3,2),(8,3,2),(9,3,2),(10,3,2),(11,3,2);
/*!40000 ALTER TABLE `ratings` ENABLE KEYS */;
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
INSERT INTO `receipts` VALUES (2,'Spaghetti Napoli','Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,',1,'spaghetti%20Napoli','15 Minutes'),(3,'Lasagne','FOR RAGU: In a deep pot over low heat, warm the oil. Add the carrots and celery and sauté until the edges of the celery become translucent, about 5 minutes. Add the onion and sauté until almost translucent, about 5 minutes. Add the pancetta and cook, stirring occasionally, for 10 minutes. Then add the pork and veal and cook, stirring occasionally, until cooked but not browned, about 15 minutes. Add the tomatoes and juice and simmer, uncovered, stirring occasionally, until very thick, 2-2 1/2 hours. Season to taste with salt, pepper and nutmeg.<br/><br/>FOR SAUCE: Melt butter in a saucepan over low heat. Whisk in the flour until blended, then gradually whisk in the hot milk. Simmer, whisking constantly and scraping the sides and bottom of the pan with a spatula as necessary to avoid burning, until the raw flour flavor dissipates, about 5 minutes. Remove from the heat and season to taste with salt, white pepper and nutmeg.<br/><br/>TO ASSEMBLE: Cook lasagna noodles in large pot of boiling salted water until al dente. Drain then rinse under cold water.<br/><br/>Preheat oven to 400 degrees F. Spread 1/2 cup ragù over the bottom of 13x9-inch baking dish. Arrange a single layer of the noodles on top, do not overlap. Spread 1/3 cup of the white sauce over noodles. Top with another 1/2-2/3 cup ragù. Sprinkle with 3-4 tablespoons of the Parmesan cheese, then season to taste with salt and pepper. Repeat layering with the noodles, sauces and cheese. Arrange a final layer of noodles on top. Spread with white sauce and sprinkle with cheese.<br/><br/>Bake until sauces bubble and top is golden brown, about 40 minutes. Let stand 5 minutes. Cut into pieces and transfer to warm individual plates.',3,'Placeholder','45 Minutes'),(4,'Ravioli','test',1,'Placeholder','10 Minutes'),(5,'Riz Casimir','test',2,'Placeholder','30 Minutes');
/*!40000 ALTER TABLE `receipts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `receipts2advices`
--

DROP TABLE IF EXISTS `receipts2advices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `receipts2advices` (
  `receipts2advicesId` int(11) NOT NULL AUTO_INCREMENT,
  `receiptId` int(11) NOT NULL,
  `adviceId` int(11) NOT NULL,
  PRIMARY KEY (`receipts2advicesId`),
  KEY `fk_receipt_receipt2advice_idx` (`receiptId`),
  KEY `fk_advice_receipt2advice_idx` (`adviceId`),
  CONSTRAINT `fk_receipt_receipt2advice` FOREIGN KEY (`receiptId`) REFERENCES `receipts` (`receiptId`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_advice_receipt2advice` FOREIGN KEY (`adviceId`) REFERENCES `importantadvices` (`adviceId`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `receipts2advices`
--

LOCK TABLES `receipts2advices` WRITE;
/*!40000 ALTER TABLE `receipts2advices` DISABLE KEYS */;
INSERT INTO `receipts2advices` VALUES (1,3,2),(2,3,7),(3,2,7),(4,2,9),(5,4,7),(6,2,3),(7,3,3),(8,4,3);
/*!40000 ALTER TABLE `receipts2advices` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
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

-- Dump completed on 2014-05-25 22:27:37
