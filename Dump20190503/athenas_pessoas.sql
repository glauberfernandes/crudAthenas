-- MySQL dump 10.13  Distrib 5.7.25, for Linux (i686)
--
-- Host: localhost    Database: athenas
-- ------------------------------------------------------
-- Server version	5.7.25-0ubuntu0.18.04.2

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
-- Table structure for table `pessoas`
--

DROP TABLE IF EXISTS `pessoas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pessoas` (
  `codPessoas` int(11) NOT NULL AUTO_INCREMENT,
  `nomePessoas` varchar(100) NOT NULL,
  `emailPessoas` varchar(100) NOT NULL,
  `codCategoria` int(11) NOT NULL,
  PRIMARY KEY (`codPessoas`),
  KEY `codCategoria` (`codCategoria`),
  CONSTRAINT `pessoas_ibfk_1` FOREIGN KEY (`codCategoria`) REFERENCES `categoria` (`codCategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pessoas`
--

LOCK TABLES `pessoas` WRITE;
/*!40000 ALTER TABLE `pessoas` DISABLE KEYS */;
INSERT INTO `pessoas` VALUES (1,'Jorge da Silva','jorge@terra.com.br',1),(2,'Flavia Monteiro','flavia@globo.com',2),(3,'Marcos Frota Ribeiro','ribeiro@gmail.com',2),(4,'Raphael Souza Santos','rsantos@gmail.com',1),(5,'Pedro Paulo Mota','ppmota@gmail.com',1),(6,'Winder Carvalho da Silva','winder@hotmail.com',3),(7,'Maria da Penha Albuquerque','mpa@hotmail.com',3),(8,'Rafael Garcia Souza','rgsouza@hotmail.com',3),(9,'Tabata Costa','tabata_costa@gmail.com',2),(10,'Ronil Camarote','camarote@terra.com.br',1),(11,'Joaquim Barbosa','barbosa@globo.com',1),(12,'Eveline Maria Alcantra','ev_alcantra@gmail.com',2),(13,'JoÃ£o Paulo Vieira','jpvieria@gmail.com',1),(14,'Carla Zamborlini','zamborlini@terra.com.br',3);
/*!40000 ALTER TABLE `pessoas` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-05-03 16:17:09
