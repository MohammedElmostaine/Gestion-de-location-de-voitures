-- MySQL dump 10.13  Distrib 8.0.28, for Win64 (x86_64)
--
-- Host: localhost    Database: projet1
-- ------------------------------------------------------
-- Server version	8.0.28

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
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clients` (
  `Nclient` int NOT NULL,
  `Nom` varchar(50) DEFAULT NULL,
  `Adresse` varchar(100) DEFAULT NULL,
  `Ntele` int DEFAULT NULL,
  PRIMARY KEY (`Nclient`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clients`
--

LOCK TABLES `clients` WRITE;
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
INSERT INTO `clients` VALUES (1,'ahmed sabiri','casablancamaroc',625874694),(2,'fatima lamri','rabat, maroc',654789874),(3,'ali jabar','tantan, maroc',631245987),(4,'hassan majid','safi , maroc',624659818);
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contrats`
--

DROP TABLE IF EXISTS `contrats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contrats` (
  `Numero` int NOT NULL,
  `DatedDebut` date DEFAULT NULL,
  `DatedFin` date DEFAULT NULL,
  `Duree` int DEFAULT NULL,
  `Nclient` int DEFAULT NULL,
  `Nimmatriculation` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`Numero`),
  KEY `Nclient` (`Nclient`),
  KEY `Nimmatriculation` (`Nimmatriculation`),
  CONSTRAINT `contrats_ibfk_1` FOREIGN KEY (`Nclient`) REFERENCES `clients` (`Nclient`),
  CONSTRAINT `contrats_ibfk_2` FOREIGN KEY (`Nimmatriculation`) REFERENCES `voiture` (`Nimmatriculation`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contrats`
--

LOCK TABLES `contrats` WRITE;
/*!40000 ALTER TABLE `contrats` DISABLE KEYS */;
INSERT INTO `contrats` VALUES (2,'2024-02-01','2024-02-05',5,2,'5678XYZ'),(3,'2024-05-04','2024-06-07',6,3,'5896CJRY');
/*!40000 ALTER TABLE `contrats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `voiture`
--

DROP TABLE IF EXISTS `voiture`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `voiture` (
  `Nimmatriculation` varchar(50) NOT NULL,
  `Marque` varchar(50) DEFAULT NULL,
  `modele` varchar(50) DEFAULT NULL,
  `Annee` int DEFAULT NULL,
  PRIMARY KEY (`Nimmatriculation`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `voiture`
--

LOCK TABLES `voiture` WRITE;
/*!40000 ALTER TABLE `voiture` DISABLE KEYS */;
INSERT INTO `voiture` VALUES ('1234ABC','Toyota','Corolla',2020),('5678XYZ','Renault','Clio',2021),('5896CJRY','BMW','serie5',2024);
/*!40000 ALTER TABLE `voiture` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'projet1'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-12-10 10:05:20
