-- MariaDB dump 10.19  Distrib 10.6.16-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: ZOO
-- ------------------------------------------------------
-- Server version	10.6.16-MariaDB-0ubuntu0.22.04.1

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
-- Table structure for table `animals`
--

DROP TABLE IF EXISTS `animals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `animals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `animals`
--

LOCK TABLES `animals` WRITE;
/*!40000 ALTER TABLE `animals` DISABLE KEYS */;
INSERT INTO `animals` VALUES (1,'horse','2024-02-11 17:37:31','2024-02-11 17:37:31'),(2,'dog','2024-02-11 17:37:31','2024-02-11 17:37:31'),(3,'duck','2024-02-11 17:37:31','2024-02-11 17:37:31'),(4,'hendgehog','2024-02-11 17:37:31','2024-02-11 17:37:31'),(5,'squirrel','2024-02-11 17:37:31','2024-02-11 17:37:31');
/*!40000 ALTER TABLE `animals` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `emplooyee`
--

DROP TABLE IF EXISTS `emplooyee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `emplooyee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `emplooyee`
--

LOCK TABLES `emplooyee` WRITE;
/*!40000 ALTER TABLE `emplooyee` DISABLE KEYS */;
INSERT INTO `emplooyee` VALUES (1,'Chuck','2024-02-11 17:37:51','2024-02-11 17:37:51'),(2,'James','2024-02-11 17:37:51','2024-02-11 17:37:51'),(3,'Sarah','2024-02-11 17:37:51','2024-02-11 17:37:51'),(4,'Lucius','2024-02-11 17:37:51','2024-02-11 17:37:51');
/*!40000 ALTER TABLE `emplooyee` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `food`
--

DROP TABLE IF EXISTS `food`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `food` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `animal_feed` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `food`
--

LOCK TABLES `food` WRITE;
/*!40000 ALTER TABLE `food` DISABLE KEYS */;
INSERT INTO `food` VALUES (1,'a pineapple','2024-02-11 17:43:38','2024-02-11 17:43:38'),(2,'banana','2024-02-11 17:43:38','2024-02-11 17:43:38'),(3,'coconut','2024-02-11 17:43:38','2024-02-11 17:43:38'),(4,'daddy','2024-02-11 17:43:38','2024-02-11 17:43:38'),(5,'grapefruit','2024-02-11 17:43:38','2024-02-11 17:43:38'),(6,'meat','2024-02-11 17:43:38','2024-02-11 17:43:38'),(7,'orange','2024-02-11 17:43:38','2024-02-11 17:43:38'),(8,'potato','2024-02-11 17:43:38','2024-02-11 17:43:38'),(9,'tomato','2024-02-11 17:43:38','2024-02-11 17:43:38');
/*!40000 ALTER TABLE `food` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `food_animal`
--

DROP TABLE IF EXISTS `food_animal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `food_animal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `animal_feed_id` int(11) NOT NULL,
  `animal_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `food_animal_id_foreign` (`animal_id`),
  KEY `food_animal_animal_feed_id_foreign` (`animal_feed_id`),
  CONSTRAINT `food_animal_animal_feed_id_foreign` FOREIGN KEY (`animal_feed_id`) REFERENCES `food` (`id`),
  CONSTRAINT `food_animal_id_foreign` FOREIGN KEY (`animal_id`) REFERENCES `animals` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `food_animal`
--

LOCK TABLES `food_animal` WRITE;
/*!40000 ALTER TABLE `food_animal` DISABLE KEYS */;
INSERT INTO `food_animal` VALUES (1,1,1,'2024-02-11 17:49:22','2024-02-11 17:49:22'),(2,2,1,'2024-02-11 17:49:22','2024-02-11 17:49:22'),(3,3,2,'2024-02-11 17:49:22','2024-02-11 17:49:22'),(4,4,1,'2024-02-11 17:49:22','2024-02-11 17:49:22'),(5,5,1,'2024-02-11 17:49:22','2024-02-11 17:49:22'),(6,6,2,'2024-02-11 17:49:22','2024-02-11 17:49:22'),(7,7,3,'2024-02-11 17:49:22','2024-02-11 17:49:22'),(8,8,1,'2024-02-11 17:49:22','2024-02-11 17:49:22'),(9,9,1,'2024-02-11 17:49:22','2024-02-11 17:49:22'),(10,1,3,'2024-02-11 17:49:22','2024-02-11 17:49:22'),(11,2,3,'2024-02-11 17:49:22','2024-02-11 17:49:22'),(12,3,3,'2024-02-11 17:49:22','2024-02-11 17:49:22'),(13,4,3,'2024-02-11 17:49:22','2024-02-11 17:49:22'),(14,5,3,'2024-02-11 17:49:22','2024-02-11 17:49:22'),(15,6,5,'2024-02-11 17:49:22','2024-02-11 17:49:22'),(16,7,4,'2024-02-11 17:49:22','2024-02-11 17:49:22'),(17,8,2,'2024-02-11 17:49:22','2024-02-11 17:49:22'),(18,9,2,'2024-02-11 17:49:22','2024-02-11 17:49:22'),(19,1,5,'2024-02-11 17:49:22','2024-02-11 17:49:22'),(20,2,5,'2024-02-11 17:49:22','2024-02-11 17:49:22'),(21,3,5,'2024-02-11 17:49:22','2024-02-11 17:49:22'),(22,4,5,'2024-02-11 17:49:22','2024-02-11 17:49:22'),(23,5,5,'2024-02-11 17:49:22','2024-02-11 17:49:22'),(24,5,4,'2024-02-11 17:49:22','2024-02-11 17:49:22'),(25,7,5,'2024-02-11 17:49:22','2024-02-11 17:49:22'),(26,8,5,'2024-02-11 17:49:22','2024-02-11 17:49:22'),(27,9,5,'2024-02-11 17:49:22','2024-02-11 17:49:22');
/*!40000 ALTER TABLE `food_animal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `supervisor`
--

DROP TABLE IF EXISTS `supervisor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `supervisor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `supervisor_id` int(11) NOT NULL,
  `animals_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `supervisor_supervisor_id_foreign` (`supervisor_id`),
  KEY `supervisor_animals_id_foreign` (`animals_id`),
  CONSTRAINT `supervisor_animals_id_foreign` FOREIGN KEY (`animals_id`) REFERENCES `animals` (`id`),
  CONSTRAINT `supervisor_supervisor_id_foreign` FOREIGN KEY (`supervisor_id`) REFERENCES `emplooyee` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `supervisor`
--

LOCK TABLES `supervisor` WRITE;
/*!40000 ALTER TABLE `supervisor` DISABLE KEYS */;
INSERT INTO `supervisor` VALUES (1,1,1,'2024-02-11 17:38:10','2024-02-11 17:38:10','2024-02-11 17:38:10'),(2,1,2,'2024-02-11 17:38:10','2024-02-11 17:38:10','2024-02-11 17:38:10'),(3,2,3,'2024-02-11 17:38:10','2024-02-11 17:38:10','2024-02-11 17:38:10'),(4,3,5,'2024-02-11 17:38:10','2024-02-11 17:38:10','2024-02-11 17:38:10'),(5,4,4,'2024-02-11 17:38:10','2024-02-11 17:38:10','2024-02-11 17:38:10'),(6,4,2,'2024-02-11 17:38:10','2024-02-11 17:38:10','2024-02-11 17:38:10');
/*!40000 ALTER TABLE `supervisor` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-02-11 18:53:56
