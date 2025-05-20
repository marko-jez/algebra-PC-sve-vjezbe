-- MySQL dump 10.13  Distrib 8.0.42, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: videoteka
-- ------------------------------------------------------
-- Server version	9.1.0

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cjenik_posudbe`
--

DROP TABLE IF EXISTS `cjenik_posudbe`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cjenik_posudbe` (
  `cjenikId` tinyint unsigned NOT NULL,
  `kategorija` varchar(255) NOT NULL,
  `cijena` double(3,2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cjenik_posudbe`
--

LOCK TABLES `cjenik_posudbe` WRITE;
/*!40000 ALTER TABLE `cjenik_posudbe` DISABLE KEYS */;
INSERT INTO `cjenik_posudbe` VALUES (1,'Akcija',9.99),(2,'Komedija',7.99),(3,'Horor',3.99),(4,'Drama',9.99);
/*!40000 ALTER TABLE `cjenik_posudbe` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clanovi`
--

DROP TABLE IF EXISTS `clanovi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `clanovi` (
  `clanskiBroj` int unsigned NOT NULL,
  `ime` varchar(255) NOT NULL,
  `prezime` varchar(255) NOT NULL,
  `datumUclanjenja` date NOT NULL,
  PRIMARY KEY (`clanskiBroj`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clanovi`
--

LOCK TABLES `clanovi` WRITE;
/*!40000 ALTER TABLE `clanovi` DISABLE KEYS */;
INSERT INTO `clanovi` VALUES (1,'Ivan','Ivić','2025-05-15'),(2,'Ana','Horvat','2022-11-03'),(3,'Ivan','Horvat','2023-09-12'),(4,'Marko','Horvat','2022-11-03'),(5,'Nikola','Mlakar','2024-01-20'),(6,'Ana','Kovač','2023-03-15'),(7,'Petra','Barišić','2023-07-22'),(8,'Luka','Novak','2024-02-10'),(9,'Katarina','Grgić','2022-08-30'),(10,'Tomislav','Radić','2023-12-05');
/*!40000 ALTER TABLE `clanovi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `filmovi`
--

DROP TABLE IF EXISTS `filmovi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `filmovi` (
  `imdbId` int unsigned NOT NULL,
  `naziv` varchar(255) NOT NULL,
  `godina` int unsigned NOT NULL,
  `kolicinaDvd` tinyint unsigned NOT NULL,
  `kolicinaBluRay` tinyint unsigned NOT NULL,
  `zanrId` tinyint unsigned NOT NULL,
  PRIMARY KEY (`imdbId`),
  KEY `fk_zanrId` (`zanrId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `filmovi`
--

LOCK TABLES `filmovi` WRITE;
/*!40000 ALTER TABLE `filmovi` DISABLE KEYS */;
INSERT INTO `filmovi` VALUES (1,'Policijska akademija',2000,10,7,1),(2,'Forrest Gump',2010,7,5,1),(3,'Mamurluk',2015,5,3,1),(4,'Resident evil',1999,3,2,2),(5,'Saw',2020,2,2,2),(6,'Slagalica strave',2005,3,3,2);
/*!40000 ALTER TABLE `filmovi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posudbe`
--

DROP TABLE IF EXISTS `posudbe`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `posudbe` (
  `posudbaId` int unsigned NOT NULL,
  `filmId` int unsigned NOT NULL,
  `clanskiBroj` int unsigned NOT NULL,
  `datumPosudbe` date NOT NULL,
  `datumPovrata` date NOT NULL,
  `cjenikId` tinyint unsigned NOT NULL,
  PRIMARY KEY (`posudbaId`),
  KEY `fk_filmId` (`filmId`),
  KEY `fk_clanskiBroj` (`clanskiBroj`),
  KEY `fk_cjenikId` (`cjenikId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posudbe`
--

LOCK TABLES `posudbe` WRITE;
/*!40000 ALTER TABLE `posudbe` DISABLE KEYS */;
INSERT INTO `posudbe` VALUES (1,1,1,'2024-05-01','2024-05-08',2),(2,2,2,'2024-05-03','2024-05-10',2),(3,4,3,'2024-05-05','2024-05-12',3),(4,5,4,'2024-05-07','2024-05-14',3);
/*!40000 ALTER TABLE `posudbe` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zanrovi`
--

DROP TABLE IF EXISTS `zanrovi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `zanrovi` (
  `zanrId` tinyint unsigned NOT NULL,
  `naziv` varchar(255) NOT NULL,
  PRIMARY KEY (`zanrId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zanrovi`
--

LOCK TABLES `zanrovi` WRITE;
/*!40000 ALTER TABLE `zanrovi` DISABLE KEYS */;
INSERT INTO `zanrovi` VALUES (4,'Western'),(1,'Komedija'),(2,'Drama'),(3,'Horor');
/*!40000 ALTER TABLE `zanrovi` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-05-20 12:19:41
