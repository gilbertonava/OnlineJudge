CREATE DATABASE  IF NOT EXISTS `online_judge` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `online_judge`;
-- MySQL dump 10.13  Distrib 5.6.17, for Win32 (x86)
--
-- Host: 127.0.0.1    Database: online_judge
-- ------------------------------------------------------
-- Server version	5.6.17

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
-- Table structure for table `administrador`
--

DROP TABLE IF EXISTS `administrador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `administrador` (
  `idUsuario` int(11) NOT NULL,
  `credencial` varchar(45) NOT NULL,
  PRIMARY KEY (`idUsuario`),
  KEY `iduserAdmin_idx` (`idUsuario`),
  CONSTRAINT `iduserAdmin` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `administrador`
--

LOCK TABLES `administrador` WRITE;
/*!40000 ALTER TABLE `administrador` DISABLE KEYS */;
INSERT INTO `administrador` VALUES (1,'pass'),(2,'root');
/*!40000 ALTER TABLE `administrador` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `online_judge`.`administrador_BEFORE_INSERT` BEFORE INSERT ON `administrador` FOR EACH ROW
   INSERT INTO bitacora(host, usuario, operacion, modificado, tabla, oldValues, newValues) 
VALUES (SUBSTRING(USER(), (INSTR(USER(),'@')+1)), SUBSTRING(USER(),1,(instr(user(),'@')-1)), 'INSERTAR', NOW(), 'ADMINISTRADOR','NULL',CONCAT(new.idUsuario,' , ',new.credencial)) */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `online_judge`.`administrador_BEFORE_UPDATE` BEFORE UPDATE ON `administrador` FOR EACH ROW
INSERT INTO bitacora(host, usuario, operacion, modificado, tabla, oldValues, newValues) 
VALUES (SUBSTRING(USER(), (INSTR(USER(),'@')+1)), SUBSTRING(USER(),1,(instr(user(),'@')-1)), 'INSERTAR', NOW(), 'ADMINISTRADOR',CONCAT(old.idUsuario,' , ',old.credencial),CONCAT(NEW.idUsuario,' , ',NEW.credencial)) */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `online_judge`.`administrador_BEFORE_DELETE` BEFORE DELETE ON `administrador` FOR EACH ROW
    INSERT INTO bitacora(host, usuario, operacion, modificado, tabla, oldValues, newValues) 
VALUES (SUBSTRING(USER(), (INSTR(USER(),'@')+1)), SUBSTRING(USER(),1,(instr(user(),'@')-1)), 'INSERTAR', NOW(), 'ADMINISTRADOR','NULL',CONCAT(old.idUsuario,' , ',old.credencial)) */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `alumno`
--

DROP TABLE IF EXISTS `alumno`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alumno` (
  `idUsuario` int(11) NOT NULL,
  `nControl` varchar(45) NOT NULL,
  PRIMARY KEY (`idUsuario`),
  KEY `iduser_idx` (`idUsuario`),
  CONSTRAINT `iduser` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alumno`
--

LOCK TABLES `alumno` WRITE;
/*!40000 ALTER TABLE `alumno` DISABLE KEYS */;
INSERT INTO `alumno` VALUES (1,'NAN'),(9,'WTF123TEC'),(10,'WTF123TEC'),(11,'WTF123TEC'),(12,'WTF123TEC'),(13,'WTF123TEC'),(14,'WTF123TEC');
/*!40000 ALTER TABLE `alumno` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `online_judge`.`alumno_BEFORE_INSERT` BEFORE INSERT ON `alumno` FOR EACH ROW
    INSERT INTO bitacora(host, usuario, operacion, modificado, tabla, oldValues, newValues) 
VALUES (SUBSTRING(USER(), (INSTR(USER(),'@')+1)), SUBSTRING(USER(),1,(instr(user(),'@')-1)), 'INSERTAR', NOW(), 'ALUMNO','NULL',CONCAT(NEW.idUsuario,' , ',NEW.ncontrol)) */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `online_judge`.`alumno_BEFORE_UPDATE` BEFORE UPDATE ON `alumno` FOR EACH ROW
    INSERT INTO bitacora(host, usuario, operacion, modificado, tabla, oldValues, newValues) 
VALUES (SUBSTRING(USER(), (INSTR(USER(),'@')+1)), SUBSTRING(USER(),1,(instr(user(),'@')-1)), 'ACTUALIZAR', NOW(), 'ALUMNO',CONCAT(old.idUsuario,' , ',old.ncontrol),CONCAT(NEW.idUsuario,' , ',NEW.ncontrol)) */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `online_judge`.`alumno_BEFORE_DELETE` BEFORE DELETE ON `alumno` FOR EACH ROW
    INSERT INTO bitacora(host, usuario, operacion, modificado, tabla, oldValues, newValues) 
VALUES (SUBSTRING(USER(), (INSTR(USER(),'@')+1)), SUBSTRING(USER(),1,(instr(user(),'@')-1)), 'ELIMINAR', NOW(), 'ALUMNO',CONCAT(old.idUsuario,' , ',old.ncontrol),'NULL') */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `alumno_has_examen`
--

DROP TABLE IF EXISTS `alumno_has_examen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alumno_has_examen` (
  `alumno_idUsuario` int(11) NOT NULL DEFAULT '0',
  `examen_idexamen` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`alumno_idUsuario`,`examen_idexamen`),
  KEY `fk_alumno_has_examen_examen1_idx` (`examen_idexamen`),
  KEY `fk_alumno_has_examen_alumno1_idx` (`alumno_idUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alumno_has_examen`
--

LOCK TABLES `alumno_has_examen` WRITE;
/*!40000 ALTER TABLE `alumno_has_examen` DISABLE KEYS */;
INSERT INTO `alumno_has_examen` VALUES (1,1),(14,1),(9,5),(10,5),(11,6),(12,6),(12,8),(1,9),(9,9),(10,9),(11,9),(12,9),(13,9),(14,9);
/*!40000 ALTER TABLE `alumno_has_examen` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `online_judge`.`alumno_has_examen_BEFORE_INSERT` BEFORE INSERT ON `alumno_has_examen` FOR EACH ROW
    INSERT INTO bitacora(host, usuario, operacion, modificado, tabla, oldValues, newValues) 
VALUES (SUBSTRING(USER(), (INSTR(USER(),'@')+1)), SUBSTRING(USER(),1,(instr(user(),'@')-1)), 'INSERTAR', NOW(), 'ALUMNO_HAS_EXAMEN','NULL',CONCAT(NEW.alumno_idUsuario,' , ',NEW.examen_idexamen)) */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `online_judge`.`alumno_has_examen_BEFORE_UPDATE` BEFORE UPDATE ON `alumno_has_examen` FOR EACH ROW
    INSERT INTO bitacora(host, usuario, operacion, modificado, tabla, oldValues, newValues) 
VALUES (SUBSTRING(USER(), (INSTR(USER(),'@')+1)), SUBSTRING(USER(),1,(instr(user(),'@')-1)), 'ACTUALIZAR', NOW(), 'ALUMNO_HAS_EXAMEN',CONCAT(old.alumno_idUsuario,' , ',old.examen_idexamen),CONCAT(NEW.alumno_idUsuario,' , ',NEW.examen_idexamen)) */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `online_judge`.`alumno_has_examen_BEFORE_DELETE` BEFORE DELETE ON `alumno_has_examen` FOR EACH ROW
    INSERT INTO bitacora(host, usuario, operacion, modificado, tabla, oldValues, newValues) 
VALUES (SUBSTRING(USER(), (INSTR(USER(),'@')+1)), SUBSTRING(USER(),1,(instr(user(),'@')-1)), 'ELIMINAR', NOW(), 'ALUMNO_HAS_EXAMEN',CONCAT(old.alumno_idUsuario,' , ',old.examen_idexamen),'NULL') */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `bitacora`
--

DROP TABLE IF EXISTS `bitacora`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bitacora` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `operacion` varchar(10) DEFAULT NULL,
  `usuario` varchar(40) DEFAULT NULL,
  `host` varchar(30) NOT NULL,
  `modificado` datetime DEFAULT NULL,
  `tabla` varchar(40) NOT NULL,
  `oldValues` text,
  `newValues` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=107 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bitacora`
--

LOCK TABLES `bitacora` WRITE;
/*!40000 ALTER TABLE `bitacora` DISABLE KEYS */;
INSERT INTO `bitacora` VALUES (5,'INSERTAR','root','localhost','2015-06-16 11:40:56','ADMINISTRADOR',NULL,NULL),(6,'INSERTAR','root','localhost','2015-06-16 11:43:43','ADMINISTRADOR',NULL,NULL),(7,'ELIMINAR','root','localhost','2015-06-22 21:43:30','PROYECTO',NULL,NULL),(8,'ELIMINAR','root','localhost','2015-06-22 21:43:53','EXAMEN',NULL,NULL),(9,'ELIMINAR','root','localhost','2015-06-22 21:44:05','EXAMEN',NULL,NULL),(10,'ELIMINAR','root','localhost','2015-06-22 21:44:16','EXAMEN',NULL,NULL),(11,'INSERTAR','root','localhost','2015-06-23 02:49:11','ALUMNO',NULL,NULL),(12,'INSERTAR','root','localhost','2015-06-23 02:49:11','ALUMNO',NULL,NULL),(13,'INSERTAR','root','localhost','2015-06-23 02:49:11','ALUMNO',NULL,NULL),(14,'INSERTAR','root','localhost','2015-06-23 02:49:11','ALUMNO',NULL,NULL),(15,'INSERTAR','root','localhost','2015-06-23 02:49:11','ALUMNO',NULL,NULL),(16,'INSERTAR','root','localhost','2015-06-23 02:49:11','ALUMNO',NULL,NULL),(17,'INSERTAR','root','localhost','2015-06-23 02:49:11','ALUMNO_HAS_EXAMEN',NULL,NULL),(18,'INSERTAR','root','localhost','2015-06-23 02:49:11','ALUMNO_HAS_EXAMEN',NULL,NULL),(19,'INSERTAR','root','localhost','2015-06-23 02:49:11','ALUMNO_HAS_EXAMEN',NULL,NULL),(20,'INSERTAR','root','localhost','2015-06-23 02:49:11','DOCENTE',NULL,NULL),(21,'INSERTAR','root','localhost','2015-06-23 02:49:11','EXAMEN',NULL,NULL),(22,'INSERTAR','root','localhost','2015-06-23 02:49:11','EXAMEN',NULL,NULL),(23,'INSERTAR','root','localhost','2015-06-23 02:53:36','MATERIA',NULL,NULL),(24,'INSERTAR','root','localhost','2015-06-23 02:53:36','MATERIA',NULL,NULL),(25,'INSERTAR','root','localhost','2015-06-23 02:53:36','MATERIA',NULL,NULL),(26,'INSERTAR','root','localhost','2015-06-23 02:53:36','MATERIA',NULL,NULL),(27,'INSERTAR','root','localhost','2015-06-23 02:53:36','MATERIA',NULL,NULL),(28,'INSERTAR','root','localhost','2015-06-23 02:53:36','MATERIA',NULL,NULL),(29,'INSERTAR','root','localhost','2015-06-23 02:53:36','PROYECTO',NULL,NULL),(30,'INSERTAR','root','localhost','2015-06-23 02:53:36','PROYECTO',NULL,NULL),(31,'INSERTAR','root','localhost','2015-06-23 02:53:36','USUARIOS',NULL,NULL),(32,'INSERTAR','root','localhost','2015-06-23 02:53:36','USUARIOS',NULL,NULL),(33,'INSERTAR','root','localhost','2015-06-23 02:53:36','USUARIOS',NULL,NULL),(34,'INSERTAR','root','localhost','2015-06-23 02:53:36','USUARIOS',NULL,NULL),(35,'INSERTAR','root','localhost','2015-06-23 02:53:36','USUARIOS',NULL,NULL),(36,'INSERTAR','root','localhost','2015-06-23 02:53:36','USUARIOS',NULL,NULL),(37,'INSERTAR','root','localhost','2015-06-23 02:53:36','USUARIOS',NULL,NULL),(38,'ELIMINAR','root','localhost','2015-06-23 00:06:50','MATERIA',NULL,NULL),(39,'INSERTAR','root','localhost','2015-06-23 00:15:00','ALUMNO_HAS_EXAMEN',NULL,NULL),(40,'INSERTAR','root','localhost','2015-06-23 00:16:22','EXAMEN',NULL,NULL),(41,'INSERTAR','root','localhost','2015-06-23 00:17:26','ALUMNO_HAS_EXAMEN',NULL,NULL),(42,'ELIMINAR','root','localhost','2015-06-23 00:24:04','ALUMNO_HAS_EXAMEN',NULL,NULL),(43,'ELIMINAR','root','localhost','2015-06-23 00:24:20','EXAMEN',NULL,NULL),(44,'INSERTAR','root','localhost','2015-06-23 00:25:08','EXAMEN',NULL,NULL),(45,'INSERTAR','root','localhost','2015-06-23 00:25:37','EXAMEN',NULL,NULL),(46,'INSERTAR','root','localhost','2015-06-23 00:25:56','ALUMNO_HAS_EXAMEN',NULL,NULL),(47,'INSERTAR','root','localhost','2015-06-23 00:25:56','ALUMNO_HAS_EXAMEN',NULL,NULL),(48,'ACTUALIZAR','root','localhost','2015-06-23 00:26:12','EXAMEN',NULL,NULL),(49,'ELIMINAR','root','localhost','2015-06-23 00:26:17','EXAMEN',NULL,NULL),(50,'INSERTAR','root','localhost','2015-06-23 11:24:47','EXAMEN',NULL,NULL),(51,'INSERTAR','root','localhost','2015-06-23 11:27:30','EXAMEN',NULL,NULL),(52,'INSERTAR','root','localhost','2015-06-23 11:37:56','USUARIOS',NULL,NULL),(53,'INSERTAR','root','localhost','2015-06-23 11:37:56','USUARIOS',NULL,NULL),(54,'INSERTAR','root','localhost','2015-06-23 11:37:56','USUARIOS',NULL,NULL),(55,'INSERTAR','root','localhost','2015-06-23 11:37:56','USUARIOS',NULL,NULL),(56,'INSERTAR','root','localhost','2015-06-23 11:37:56','USUARIOS',NULL,NULL),(57,'INSERTAR','root','localhost','2015-06-23 12:10:48','MATERIA',NULL,NULL),(58,'INSERTAR','root','localhost','2015-06-23 12:28:16','MATERIA',NULL,NULL),(59,'ELIMINAR','root','localhost','2015-06-23 12:41:25','MATERIA',NULL,NULL),(60,'INSERTAR','root','localhost','2015-06-23 12:42:49','EC. DIFERENCIALES , 50',NULL,NULL),(61,'INSERTAR','root','localhost','2015-06-23 12:42:49','MATERIA',NULL,NULL),(62,'ELIMINAR','root','localhost','2015-06-23 13:31:59','MATERIA',NULL,NULL),(63,'INSERTAR','root','localhost','2015-06-23 13:35:37','MATERIA','NULL','TIC\'S , 4 , 1'),(64,'INSERTAR','root','localhost','2015-06-23 13:35:37','MATERIA',NULL,NULL),(65,'INSERTAR','root','localhost','2015-06-23 16:49:58','MATERIA','EC. DIFERENCIALES , 50 , 1','EC. DIFERENCIALES , 25 , 1'),(66,'ACTUALIZAR','root','localhost','2015-06-23 16:49:58','MATERIA',NULL,NULL),(67,'INSERTAR','root','localhost','2015-06-23 16:52:08','MATERIA','EC. DIFERENCIALES , 25 , 1','EC. DIFERENCIALES , 10 , 1'),(68,'ACTUALIZAR','root','localhost','2015-06-23 16:52:08','MATERIA',NULL,NULL),(69,'INSERTAR','root','localhost','2015-06-23 16:52:25','MATERIA','EC. DIFERENCIALES , 10 , 1','NULL'),(70,'ELIMINAR','root','localhost','2015-06-23 16:52:25','MATERIA',NULL,NULL),(71,'INSERTAR','root','localhost','2015-06-23 19:42:25','MATERIA','INGENIERIA DE SOFTWARE , 5 , 1','INGENIERIA DE SOFTWARE , 7 , 1'),(72,'INSERTAR','root','localhost','2015-06-23 19:44:23','MATERIA','TIC\'S , 4 , 1','NULL'),(73,'INSERTAR','root','localhost','2015-06-23 20:14:20','ALUMNO_HAS_EXAMEN','NULL','12 , 6'),(75,'ELIMINAR','root','localhost','2015-06-23 20:16:39','ALUMNO_HAS_EXAMEN','12 , 6','NULL'),(76,'INSERTAR','root','localhost','2015-06-23 20:16:54','ALUMNO_HAS_EXAMEN','NULL','12 , 8'),(77,'ELIMINAR','root','localhost','2015-06-23 20:17:10','EXAMEN','f6d85c63887ee6a2709d289bb6678867191a7997_@_@_a-star.pdf , 4 , 2015-06-23 , 08:00:00 , 12:00:00 , 6 , ACTIVO','NULL'),(78,'INSERTAR','root','localhost','2015-06-23 21:03:18','ALUMNO_HAS_EXAMEN','NULL','11 , 6'),(79,'INSERTAR','root','localhost','2015-06-23 21:03:18','ALUMNO_HAS_EXAMEN','NULL','12 , 6'),(82,'ELIMINAR','root','localhost','2015-06-23 21:05:33','ALUMNO_HAS_EXAMEN','9 , 1','NULL'),(83,'ELIMINAR','root','localhost','2015-06-23 21:05:43','ALUMNO_HAS_EXAMEN','10 , 1','NULL'),(84,'ELIMINAR','root','localhost','2015-06-23 21:05:47','ALUMNO_HAS_EXAMEN','11 , 1','NULL'),(85,'ELIMINAR','root','localhost','2015-06-23 21:10:37','USUARIOS','PEPE , JOSE ANDRES , PEREZ , MURILLO , PEMUJO123 , M , 1978-12-23 , ACTIVO','NULL'),(86,'ELIMINAR','root','localhost','2015-06-23 21:10:37','USUARIOS','pepe , jose , murillo , hdz , 1 , m , 0000-00-00 , ACTIVO','NULL'),(87,'ELIMINAR','root','localhost','2015-06-23 21:10:37','USUARIOS','DULCE , DULCE , MEDINA , OJEDA , 123 , F , 1993-01-21 , ACTIVO','NULL'),(88,'ELIMINAR','root','localhost','2015-06-23 21:10:37','USUARIOS','REGIIZ , REGINO , MARTINEZ , PEREZ , 1 , M , 1993-01-12 , ACTIVO','NULL'),(89,'INSERTAR','root','localhost','2015-06-23 21:10:58','ALUMNO','NULL','1 , NAN'),(90,'INSERTAR','root','localhost','2015-06-23 21:11:13','ALUMNO_HAS_EXAMEN','NULL','1 , 1'),(93,'INSERTAR','root','localhost','2015-06-23 21:20:29','EXAMEN','NULL','78ba26e76c507b3a1b3bde79591369f43dc84ee2_@_@_SBM.pdf , 8 , 0000-00-00 , 00:00:09 , 00:00:09 , 8 , ACTIVO'),(94,'ACTUALIZAR','root','localhost','2015-06-23 21:21:20','EXAMEN','78ba26e76c507b3a1b3bde79591369f43dc84ee2_@_@_SBM.pdf , 8 , 0000-00-00 , 00:00:09 , 00:00:09 , 8 , ACTIVO','78ba26e76c507b3a1b3bde79591369f43dc84ee2_@_@_SBM.pdf , 8 , 0000-00-00 , 00:00:09 , 00:00:09 , 8 , ACTIVO'),(95,'ACTUALIZAR','root','localhost','2015-06-23 21:21:45','EXAMEN','78ba26e76c507b3a1b3bde79591369f43dc84ee2_@_@_SBM.pdf , 8 , 0000-00-00 , 00:00:09 , 00:00:09 , 8 , ACTIVO','78ba26e76c507b3a1b3bde79591369f43dc84ee2_@_@_SBM.pdf , 8 , 0000-00-00 , 00:00:09 , 00:00:09 , 8 , ACTIVO'),(96,'INSERTAR','root','localhost','2015-06-23 21:33:54','EXAMEN','NULL','2eb512ab3f2b7202aef926b22c95f836df9e7d7c_@_@_Telcel _ Mi Telcel15-06-2015.pdf , 7 , 0000-00-00 , 00:00:09 , 00:00:10 , 7 , ACTIVO'),(97,'ACTUALIZAR','root','localhost','2015-06-23 21:39:22','EXAMEN','78ba26e76c507b3a1b3bde79591369f43dc84ee2_@_@_SBM.pdf , 8 , 0000-00-00 , 00:00:09 , 00:00:09 , 8 , ACTIVO','78ba26e76c507b3a1b3bde79591369f43dc84ee2_@_@_SBM.pdf , 8 , 2015-06-30 , 09:01:09 , 10:00:09 , 8 , ACTIVO'),(98,'INSERTAR','root','localhost','2015-06-23 21:41:34','ALUMNO_HAS_EXAMEN','NULL','1 , 9'),(99,'INSERTAR','root','localhost','2015-06-23 21:41:34','ALUMNO_HAS_EXAMEN','NULL','9 , 9'),(100,'INSERTAR','root','localhost','2015-06-23 21:41:34','ALUMNO_HAS_EXAMEN','NULL','10 , 9'),(101,'INSERTAR','root','localhost','2015-06-23 21:41:34','ALUMNO_HAS_EXAMEN','NULL','11 , 9'),(102,'INSERTAR','root','localhost','2015-06-23 21:41:34','ALUMNO_HAS_EXAMEN','NULL','12 , 9'),(103,'INSERTAR','root','localhost','2015-06-23 21:41:34','ALUMNO_HAS_EXAMEN','NULL','13 , 9'),(104,'INSERTAR','root','localhost','2015-06-23 21:41:34','ALUMNO_HAS_EXAMEN','NULL','14 , 9'),(106,'ELIMINAR','root','localhost','2015-06-23 22:18:35','USUARIOS','JUAN , JHON , LAGOS , LAGUNA , 3 , M , 0000-00-00 , ACTIVO , ','NULL');
/*!40000 ALTER TABLE `bitacora` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `concursante`
--

DROP TABLE IF EXISTS `concursante`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `concursante` (
  `idConcursante` int(11) NOT NULL,
  `credencial` varchar(45) NOT NULL,
  PRIMARY KEY (`idConcursante`),
  KEY `iduserConcursante_idx` (`idConcursante`),
  CONSTRAINT `iduserAdmin0` FOREIGN KEY (`idConcursante`) REFERENCES `usuarios` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `concursante`
--

LOCK TABLES `concursante` WRITE;
/*!40000 ALTER TABLE `concursante` DISABLE KEYS */;
/*!40000 ALTER TABLE `concursante` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `online_judge`.`concursante_BEFORE_INSERT` 
BEFORE INSERT ON `concursante` FOR EACH ROW
    INSERT INTO bitacora(host, usuario, operacion, modificado, tabla, oldValues, newValues) 
VALUES (SUBSTRING(USER(), (INSTR(USER(),'@')+1)), SUBSTRING(USER(),1,(instr(user(),'@')-1)), 
'INSERTAR', NOW(), 'CONCURSANTE',
'NULL',
CONCAT(NEW.idConcursante,' , ',NEW.credencial)) */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `online_judge`.`concursante_BEFORE_UPDATE` 
BEFORE UPDATE ON `concursante` FOR EACH ROW
    INSERT INTO bitacora(host, usuario, operacion, modificado, tabla, oldValues, newValues) 
VALUES (SUBSTRING(USER(), (INSTR(USER(),'@')+1)), SUBSTRING(USER(),1,(instr(user(),'@')-1)), 
'ACTUALIZAR', NOW(), 'CONCURSANTE',
CONCAT(old.idConcursante,' , ',old.credencial),
CONCAT(NEW.idConcursante,' , ',NEW.credencial)) */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `online_judge`.`concursante_BEFORE_DELETE` 
BEFORE DELETE ON `concursante` FOR EACH ROW
    INSERT INTO bitacora(host, usuario, operacion, modificado, tabla, oldValues, newValues) 
VALUES (SUBSTRING(USER(), (INSTR(USER(),'@')+1)), SUBSTRING(USER(),1,(instr(user(),'@')-1)), 
'ELIMINAR', NOW(), 'CONCURSANTE',
CONCAT(old.idConcursante,' , ',old.credencial),
'NULL') */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `docente`
--

DROP TABLE IF EXISTS `docente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `docente` (
  `idUsuario` int(11) NOT NULL,
  `matricula` varchar(45) NOT NULL,
  KEY `idUSUARIO_idx` (`idUsuario`),
  CONSTRAINT `idUSUARIO` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `docente`
--

LOCK TABLES `docente` WRITE;
/*!40000 ALTER TABLE `docente` DISABLE KEYS */;
INSERT INTO `docente` VALUES (2,'gsfduhy'),(1,'1102PEMUJO23');
/*!40000 ALTER TABLE `docente` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `online_judge`.`docente_BEFORE_INSERT` BEFORE INSERT ON `docente` FOR EACH ROW
    INSERT INTO bitacora(host, usuario, operacion, modificado, tabla, oldValues, newValues) 
VALUES (SUBSTRING(USER(), (INSTR(USER(),'@')+1)), SUBSTRING(USER(),1,(instr(user(),'@')-1)), 
'INSERTAR', NOW(), 'DOCENTE',
'NULL',
CONCAT(NEW.idUsuario,' , ',NEW.matricula)) */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `online_judge`.`docente_BEFORE_UPDATE` BEFORE UPDATE ON `docente` FOR EACH ROW
     INSERT INTO bitacora(host, usuario, operacion, modificado, tabla, oldValues, newValues) 
VALUES (SUBSTRING(USER(), (INSTR(USER(),'@')+1)), SUBSTRING(USER(),1,(instr(user(),'@')-1)), 
'ACTUALIZAR', NOW(), 'DOCENTE',
CONCAT(old.idUsuario,' , ',old.matricula),
CONCAT(NEW.idUsuario,' , ',NEW.matricula)) */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `online_judge`.`docente_BEFORE_DELETE` BEFORE DELETE ON `docente` FOR EACH ROW
     INSERT INTO bitacora(host, usuario, operacion, modificado, tabla, oldValues, newValues) 
VALUES (SUBSTRING(USER(), (INSTR(USER(),'@')+1)), SUBSTRING(USER(),1,(instr(user(),'@')-1)), 
'ELIMINAR', NOW(), 'DOCENTE',
CONCAT(old.idUsuario,' , ',old.matricula),
'NULL') */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `ejecucionexamen`
--

DROP TABLE IF EXISTS `ejecucionexamen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ejecucionexamen` (
  `idejecucion` int(11) NOT NULL,
  `idexamen` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `horaInicio` time NOT NULL,
  `horaFin` time NOT NULL,
  PRIMARY KEY (`idejecucion`),
  KEY `idexamen_idx_fk` (`idexamen`),
  CONSTRAINT `idexamen_fk` FOREIGN KEY (`idexamen`) REFERENCES `examen` (`idexamen`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ejecucionexamen`
--

LOCK TABLES `ejecucionexamen` WRITE;
/*!40000 ALTER TABLE `ejecucionexamen` DISABLE KEYS */;
/*!40000 ALTER TABLE `ejecucionexamen` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `online_judge`.`ejecucionexamen_BEFORE_INSERT` BEFORE INSERT ON `ejecucionexamen` FOR EACH ROW
        INSERT INTO bitacora(host, usuario, operacion, modificado, tabla, oldValues, newValues) 
VALUES (SUBSTRING(USER(), (INSTR(USER(),'@')+1)), SUBSTRING(USER(),1,(instr(user(),'@')-1)), 
'INSERTAR', NOW(), 'EJECUCION_EXAMEN',
'NULL',CONCAT(NEW.idexamen,' , ',NEW.fecha,' , ',NEW.horaInicio,' , ',NEW.horaFin)) */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `online_judge`.`ejecucionexamen_BEFORE_UPDATE` BEFORE UPDATE ON `ejecucionexamen` FOR EACH ROW
         INSERT INTO bitacora(host, usuario, operacion, modificado, tabla, oldValues, newValues) 
VALUES (SUBSTRING(USER(), (INSTR(USER(),'@')+1)), SUBSTRING(USER(),1,(instr(user(),'@')-1)), 
'ACTUALIZAR', NOW(), 'EJECUCION_EXAMEN',
CONCAT(OLD.idexamen,' , ',OLD.fecha,' , ',OLD.horaInicio,' , ',OLD.horaFin),CONCAT(NEW.idexamen,' , ',NEW.fecha,' , ',NEW.horaInicio,' , ',NEW.horaFin)) */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `online_judge`.`ejecucionexamen_BEFORE_DELETE` BEFORE DELETE ON `ejecucionexamen` FOR EACH ROW
       INSERT INTO bitacora(host, usuario, operacion, modificado, tabla, oldValues, newValues) 
VALUES (SUBSTRING(USER(), (INSTR(USER(),'@')+1)), SUBSTRING(USER(),1,(instr(user(),'@')-1)), 
'ELIMINAR', NOW(), 'EJECUCION_EXAMEN',
'NULL',CONCAT(OLD.idexamen,' , ',OLD.fecha,' , ',OLD.horaInicio,' , ',OLD.horaFin)) */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `ejecucionproyecto`
--

DROP TABLE IF EXISTS `ejecucionproyecto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ejecucionproyecto` (
  `idejecucion` int(11) NOT NULL,
  `idproyecto` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `horaInicio` time NOT NULL,
  `horaFin` time NOT NULL,
  PRIMARY KEY (`idejecucion`),
  KEY `idProyecto_idx` (`idproyecto`),
  CONSTRAINT `idProyecto` FOREIGN KEY (`idproyecto`) REFERENCES `proyecto` (`idproyecto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ejecucionproyecto`
--

LOCK TABLES `ejecucionproyecto` WRITE;
/*!40000 ALTER TABLE `ejecucionproyecto` DISABLE KEYS */;
/*!40000 ALTER TABLE `ejecucionproyecto` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `online_judge`.`ejecucionproyecto_BEFORE_INSERT` BEFORE INSERT ON `ejecucionproyecto` FOR EACH ROW
 INSERT INTO bitacora(host, usuario, operacion, modificado, tabla, oldValues, newValues)
 VALUES (SUBSTRING(USER(), (INSTR(USER(),'@')+1)), SUBSTRING(USER(),1,(instr(user(),'@')-1)), 'INSERTAR', NOW(), 'EJECUCIONPROYECTO',
 'NULL',CONCAT(new.idproyecto,' , ',new.fecha,' , ',new.horaInicio,' , ',new.horaFin)) */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `online_judge`.`ejecucionproyecto_BEFORE_UPDATE` BEFORE UPDATE ON `ejecucionproyecto` FOR EACH ROW
    INSERT INTO bitacora(host, usuario, operacion, modificado, tabla, oldValues, newValues)
 VALUES (SUBSTRING(USER(), (INSTR(USER(),'@')+1)), SUBSTRING(USER(),1,(instr(user(),'@')-1)), 'ACTUALIZAR', NOW(), 'EJECUCIONPROYECTO',
 CONCAT(OLD.idproyecto,' , ',OLD.fecha,' , ',OLD.horaInicio,' , ',OLD.horaFin),CONCAT(new.idproyecto,' , ',new.fecha,' , ',new.horaInicio,' , ',new.horaFin)) */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `online_judge`.`ejecucionproyecto_BEFORE_DELETE` BEFORE DELETE ON `ejecucionproyecto` FOR EACH ROW
    INSERT INTO bitacora(host, usuario, operacion, modificado, tabla, oldValues, newValues)
 VALUES (SUBSTRING(USER(), (INSTR(USER(),'@')+1)), SUBSTRING(USER(),1,(instr(user(),'@')-1)), 'ELIMINAR', NOW(), 'EJECUCIONPROYECTO',
 CONCAT(OLD.idproyecto,' , ',OLD.fecha,' , ',OLD.horaInicio,' , ',OLD.horaFin),'NULL') */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `evaluacion`
--

DROP TABLE IF EXISTS `evaluacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `evaluacion` (
  `idAlumno` int(11) NOT NULL,
  `rutaSolucion` varchar(255) NOT NULL,
  `idExamen` int(11) NOT NULL,
  `horaTermino` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nota` double NOT NULL DEFAULT '0',
  `fecha` date NOT NULL,
  `semestre` int(11) NOT NULL,
  PRIMARY KEY (`idAlumno`,`fecha`),
  KEY `IDexamen_idx` (`idExamen`),
  KEY `fk_Evaluacion_alumno1_idx` (`idAlumno`),
  CONSTRAINT `fk_Evaluacion_alumno1` FOREIGN KEY (`idAlumno`) REFERENCES `alumno` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `IDexamen` FOREIGN KEY (`idExamen`) REFERENCES `examen` (`idexamen`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `evaluacion`
--

LOCK TABLES `evaluacion` WRITE;
/*!40000 ALTER TABLE `evaluacion` DISABLE KEYS */;
/*!40000 ALTER TABLE `evaluacion` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `bit_evaluacion_ins` AFTER INSERT ON `evaluacion`
FOR EACH ROW INSERT INTO bitacora(host, usuario, operacion, modificado, tabla)
 VALUES (SUBSTRING(USER(), (INSTR(USER(),'@')+1)), SUBSTRING(USER(),1,(instr(user(),'@')-1)), 'INSERTAR', NOW(), 'EVALUACION') */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `bit_evaluacion_upd` AFTER UPDATE ON `evaluacion`
FOR EACH ROW INSERT INTO bitacora(host, usuario, operacion, modificado, tabla)
 VALUES (SUBSTRING(USER(), (INSTR(USER(),'@')+1)), SUBSTRING(USER(),1,(instr(user(),'@')-1)), 'ACTUALIZAR', NOW(), 'EVALUACION') */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `bit_evaluaciono_del` AFTER DELETE ON `evaluacion`
FOR EACH ROW INSERT INTO bitacora(host, usuario, operacion, modificado, tabla) 
VALUES (SUBSTRING(USER(), (INSTR(USER(),'@')+1)), SUBSTRING(USER(),1,(instr(user(),'@')-1)), 'ELIMINAR', NOW(), 'EVALUACION') */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `examen`
--

DROP TABLE IF EXISTS `examen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `examen` (
  `idexamen` int(11) NOT NULL AUTO_INCREMENT,
  `rutaArchivo` varchar(255) NOT NULL,
  `unidad` varchar(45) NOT NULL,
  `fechaAplicacion` date NOT NULL,
  `horaInicio` time NOT NULL,
  `horaFin` time NOT NULL,
  `idMateria` int(11) NOT NULL,
  `EstadoExamen` varchar(45) NOT NULL,
  PRIMARY KEY (`idexamen`),
  KEY `idMateria_idx` (`idMateria`),
  CONSTRAINT `idMateria` FOREIGN KEY (`idMateria`) REFERENCES `materia` (`idmateria`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `examen`
--

LOCK TABLES `examen` WRITE;
/*!40000 ALTER TABLE `examen` DISABLE KEYS */;
INSERT INTO `examen` VALUES (1,'be6b2200793bba3fb9eb02b84a159c39a8dd6dcf_@_@_GPO.pdf','8','2015-07-01','05:00:00','21:00:00',4,'ACTIVO'),(6,'19a979c6953f56cdde1d6fe6d7a5c75a086c300c_@_@_crear grafo.pdf','6','2015-01-01','00:00:00','23:59:00',6,'ACTIVO'),(7,'19a979c6953f56cdde1d6fe6d7a5c75a086c300c_@_@_crear grafo.pdf','6','2015-01-01','23:59:00','01:00:00',7,'ACTIVO'),(9,'78ba26e76c507b3a1b3bde79591369f43dc84ee2_@_@_SBM.pdf','8','2015-06-30','09:01:09','10:00:09',8,'ACTIVO'),(10,'2eb512ab3f2b7202aef926b22c95f836df9e7d7c_@_@_Telcel _ Mi Telcel15-06-2015.pdf','7','0000-00-00','00:00:09','00:00:10',7,'ACTIVO');
/*!40000 ALTER TABLE `examen` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `online_judge`.`examen_BEFORE_INSERT` BEFORE INSERT ON `examen` FOR EACH ROW
    INSERT INTO bitacora(host, usuario, operacion, modificado, tabla,oldValues,newValues)
 VALUES (SUBSTRING(USER(), (INSTR(USER(),'@')+1)), SUBSTRING(USER(),1,(instr(user(),'@')-1)), 'INSERTAR', NOW(), 'EXAMEN',
 'NULL',concat(NEW.rutaArchivo,' , ',new.unidad,' , ',new.fechaAplicacion,' , ',new.horaInicio,' , ',new.horaFin,' , ',new.idMateria,' , ',new.EstadoExamen)) */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `online_judge`.`examen_BEFORE_UPDATE` BEFORE UPDATE ON `examen` FOR EACH ROW
    INSERT INTO bitacora(host, usuario, operacion, modificado, tabla,oldValues,newValues)
 VALUES (SUBSTRING(USER(), (INSTR(USER(),'@')+1)), SUBSTRING(USER(),1,(instr(user(),'@')-1)), 'ACTUALIZAR', NOW(), 
 'EXAMEN',
 concat(OLD.rutaArchivo,' , ',OLD.unidad,' , ',OLD.fechaAplicacion,' , ',OLD.horaInicio,' , ',OLD.horaFin,' , ',OLD.idMateria,' , ',OLD.EstadoExamen)
 ,concat(NEW.rutaArchivo,' , ',new.unidad,' , ',new.fechaAplicacion,' , ',new.horaInicio,' , ',new.horaFin,' , ',new.idMateria,' , ',new.EstadoExamen)) */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `online_judge`.`examen_BEFORE_DELETE` BEFORE DELETE ON `examen` FOR EACH ROW
    INSERT INTO bitacora(host, usuario, operacion, modificado, tabla,oldValues,newValues)
 VALUES (SUBSTRING(USER(), (INSTR(USER(),'@')+1)), SUBSTRING(USER(),1,(instr(user(),'@')-1)), 'ELIMINAR', NOW(), 
 'EXAMEN',
 concat(OLD.rutaArchivo,' , ',OLD.unidad,' , ',OLD.fechaAplicacion,' , ',OLD.horaInicio,' , ',OLD.horaFin,' , ',OLD.idMateria,' , ',OLD.EstadoExamen)
 ,'NULL') */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `materia`
--

DROP TABLE IF EXISTS `materia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `materia` (
  `idmateria` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `creditos` int(11) NOT NULL,
  `idDocente` int(11) NOT NULL,
  PRIMARY KEY (`idmateria`),
  KEY `idDocente_idx` (`idDocente`),
  CONSTRAINT `idDocente` FOREIGN KEY (`idDocente`) REFERENCES `docente` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `materia`
--

LOCK TABLES `materia` WRITE;
/*!40000 ALTER TABLE `materia` DISABLE KEYS */;
INSERT INTO `materia` VALUES (1,'SGBD',4,2),(2,'SGDB',5,1),(4,'WEB',6,1),(6,'MOBILES',6,1),(7,'REDES',5,1),(8,'INGENIERIA DE SOFTWARE',7,1);
/*!40000 ALTER TABLE `materia` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `online_judge`.`materia_BEFORE_INSERT` BEFORE INSERT ON `materia` FOR EACH ROW
    INSERT INTO bitacora( host, usuario, operacion, modificado, tabla,oldValues,newValues)
 VALUES (SUBSTRING(USER(), (INSTR(USER(),'@')+1)), SUBSTRING(USER(),1,(instr(user(),'@')-1)), 'INSERTAR', NOW(),'MATERIA','NULL',CONCAT(new.nombre,' , ',new.creditos,' , ',new.idDocente)) */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `online_judge`.`materia_BEFORE_UPDATE` BEFORE UPDATE ON `materia` FOR EACH ROW
     INSERT INTO bitacora( host, usuario, operacion, modificado, tabla,oldValues,newValues)
 VALUES (SUBSTRING(USER(), (INSTR(USER(),'@')+1)), SUBSTRING(USER(),1,(instr(user(),'@')-1)), 'INSERTAR', NOW(),'MATERIA',CONCAT(old.nombre,' , ',old.creditos,' , ',old.idDocente),CONCAT(new.nombre,' , ',new.creditos,' , ',new.idDocente)) */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `online_judge`.`materia_BEFORE_DELETE` BEFORE DELETE ON `materia` FOR EACH ROW
      INSERT INTO bitacora( host, usuario, operacion, modificado, tabla,oldValues,newValues)
 VALUES (SUBSTRING(USER(), (INSTR(USER(),'@')+1)), SUBSTRING(USER(),1,(instr(user(),'@')-1)), 'INSERTAR', NOW(),'MATERIA',CONCAT(old.nombre,' , ',old.creditos,' , ',old.idDocente),'NULL') */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `proyecto`
--

DROP TABLE IF EXISTS `proyecto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `proyecto` (
  `idproyecto` int(11) NOT NULL AUTO_INCREMENT,
  `rutaProyecto` varchar(255) NOT NULL,
  `complejidad` varchar(45) NOT NULL,
  `estado` varchar(45) NOT NULL,
  `idDocente` int(11) NOT NULL,
  `nombreProyecto` varchar(200) NOT NULL,
  PRIMARY KEY (`idproyecto`),
  KEY `idDocente_fk_idx` (`idDocente`),
  CONSTRAINT `maestro` FOREIGN KEY (`idDocente`) REFERENCES `docente` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proyecto`
--

LOCK TABLES `proyecto` WRITE;
/*!40000 ALTER TABLE `proyecto` DISABLE KEYS */;
INSERT INTO `proyecto` VALUES (4,'d3f6cc94ce466e37e6f86df5f369f121bf613f33_@_@_javascript_24hour_trainer.pdf','MEDIA','ACTIVO',1,'A+B'),(5,'f63ac1211a9e17707d0739c430d334fb6ac0ea98_@_@_ec.pdf','BAJA','ACTIVO',1,'Counting Cows');
/*!40000 ALTER TABLE `proyecto` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `online_judge`.`proyecto_BEFORE_INSERT` BEFORE INSERT ON `proyecto` FOR EACH ROW
 
    INSERT INTO bitacora(host, usuario, operacion, modificado, tabla,oldValues,newValues)
 VALUES (SUBSTRING(USER(), (INSTR(USER(),'@')+1)), SUBSTRING(USER(),1,(instr(user(),'@')-1)), 'INSERTAR', NOW(), 
 'PROYECTO','NULL',
 concat(NEW.rutaProyecto,' , ',new.complejidad,' , ',new.estado,' , ',new.idDocente,' , ',new.nombreProyecto)) */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `online_judge`.`proyecto_BEFORE_UPDATE` BEFORE UPDATE ON `proyecto` FOR EACH ROW
        INSERT INTO bitacora(host, usuario, operacion, modificado, tabla,oldValues,newValues)
 VALUES (SUBSTRING(USER(), (INSTR(USER(),'@')+1)), SUBSTRING(USER(),1,(instr(user(),'@')-1)), 'ACTUALIZAR', NOW(), 
 'PROYECTO',
 concat(OLD.rutaProyecto,' , ',OLD.complejidad,' , ',OLD.estado,' , ',OLD.idDocente,' , ',OLD.nombreProyecto),
 concat(NEW.rutaProyecto,' , ',new.complejidad,' , ',new.estado,' , ',new.idDocente,' , ',new.nombreProyecto)) */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `online_judge`.`proyecto_BEFORE_DELETE` BEFORE DELETE ON `proyecto` FOR EACH ROW
       INSERT INTO bitacora(host, usuario, operacion, modificado, tabla,oldValues,newValues)
 VALUES (SUBSTRING(USER(), (INSTR(USER(),'@')+1)), SUBSTRING(USER(),1,(instr(user(),'@')-1)), 'ELIMINAR', NOW(), 
 'PROYECTO',
 concat(OLD.rutaProyecto,' , ',OLD.complejidad,' , ',OLD.estado,' , ',OLD.idDocente,' , ',OLD.nombreProyecto),'NULL') */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `solucionproyecto`
--

DROP TABLE IF EXISTS `solucionproyecto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `solucionproyecto` (
  `idsolucionProyecto` int(11) NOT NULL AUTO_INCREMENT,
  `rutaSolucionProyecto` varchar(255) NOT NULL,
  `idUsuarioEnvia` int(11) NOT NULL,
  `idProyectoEnviado` int(11) NOT NULL,
  `puntaje` double NOT NULL DEFAULT '0',
  `horaTermino` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha` date NOT NULL,
  PRIMARY KEY (`idsolucionProyecto`),
  KEY `usuarioEnvia_idx` (`idUsuarioEnvia`),
  KEY `proyectoEnvia_idx` (`idProyectoEnviado`),
  CONSTRAINT `proyectoEnvia` FOREIGN KEY (`idProyectoEnviado`) REFERENCES `proyecto` (`idproyecto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `usuarioEnvia` FOREIGN KEY (`idUsuarioEnvia`) REFERENCES `usuarios` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `solucionproyecto`
--

LOCK TABLES `solucionproyecto` WRITE;
/*!40000 ALTER TABLE `solucionproyecto` DISABLE KEYS */;
/*!40000 ALTER TABLE `solucionproyecto` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `online_judge`.`solucionproyecto_BEFORE_INSERT` BEFORE INSERT ON `solucionproyecto` FOR EACH ROW
      INSERT INTO bitacora(host, usuario, operacion, modificado, tabla,oldValues,newValues)
 VALUES (SUBSTRING(USER(), (INSTR(USER(),'@')+1)), SUBSTRING(USER(),1,(instr(user(),'@')-1)), 'INSERTAR', NOW(), 
 'SOLUCION_PROYECTO',
 'NULL',concat(NEW.rutaSolucionProyecto,' , ',new.idUsuarioEnvia,' , ',new.idProyectoEnviado,' , ',new.puntaje,' , ',new.horaTermino,new.fecha)) */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `online_judge`.`solucionproyecto_BEFORE_UPDATE` BEFORE UPDATE ON `solucionproyecto` FOR EACH ROW
     INSERT INTO bitacora(host, usuario, operacion, modificado, tabla,oldValues,newValues)
 VALUES (SUBSTRING(USER(), (INSTR(USER(),'@')+1)), SUBSTRING(USER(),1,(instr(user(),'@')-1)), 'ACTUALIZAR', NOW(), 
 'SOLUCION_PROYECTO',
 concat(OLD.rutaSolucionProyecto,' , ',OLD.idUsuarioEnvia,' , ',OLD.idProyectoEnviado,' , ',OLD.puntaje,' , ',OLD.horaTermino,OLD.fecha),concat(NEW.rutaSolucionProyecto,' , ',new.idUsuarioEnvia,' , ',new.idProyectoEnviado,' , ',new.puntaje,' , ',new.horaTermino,new.fecha)) */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `online_judge`.`solucionproyecto_BEFORE_DELETE` BEFORE DELETE ON `solucionproyecto` FOR EACH ROW
     INSERT INTO bitacora(host, usuario, operacion, modificado, tabla,oldValues,newValues)
 VALUES (SUBSTRING(USER(), (INSTR(USER(),'@')+1)), SUBSTRING(USER(),1,(instr(user(),'@')-1)), 'ACTUALIZAR', NOW(), 
 'SOLUCION_PROYECTO',
 concat(OLD.rutaSolucionProyecto,' , ',OLD.idUsuarioEnvia,' , ',OLD.idProyectoEnviado,' , ',OLD.puntaje,' , ',OLD.horaTermino,OLD.fecha),'NULL') */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `aliasUsuario` varchar(45) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `paterno` varchar(45) NOT NULL,
  `materno` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `sexo` varchar(1) NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `estado` varchar(45) NOT NULL,
  `mail` varchar(200) NOT NULL,
  PRIMARY KEY (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'pancho','francisco','campos','rios','2','m','0000-00-00','ACTIVO',''),(2,'pepe','jose','murillo','hdz','1','m','0000-00-00','ACTIVO',''),(8,'MERCE','MA MERCEDES','LOÉZ','ALVARADO','1','F','1993-12-12','ACTIVO',''),(9,'ARTU','ARTURO','MIRANDA','CASTELLANOS','1','M','1993-12-12','ACTIVO',''),(10,'LA LUPE','ALICIA','TOLEDANO','SALAZAR','1','F','1993-05-05','ACTIVO',''),(11,'PEPE','JOSE ANDRES','PEREZ','MURILLO','PEMUJO123','M','1978-12-23','ACTIVO',''),(12,'pepe','jose','murillo','hdz','1','m','0000-00-00','ACTIVO',''),(13,'DULCE','DULCE','MEDINA','OJEDA','123','F','1993-01-21','ACTIVO',''),(14,'REGIIZ','REGINO','MARTINEZ','PEREZ','1','M','1993-01-12','ACTIVO',''),(15,'MERCE','MA MERCEDES','LOÉZ','ALVARADO','1','F','1993-12-12','ACTIVO','');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `online_judge`.`usuarios_BEFORE_INSERT` BEFORE INSERT ON `usuarios` FOR EACH ROW
    INSERT INTO bitacora(host, usuario, operacion, modificado, tabla,oldValues,newValues)
 VALUES (SUBSTRING(USER(), (INSTR(USER(),'@')+1)), SUBSTRING(USER(),1,(instr(user(),'@')-1)), 'INSERTAR', NOW(), 'USUARIOS',
 'NULL',concat(NEW.aliasUsuario,' , ',new.nombre,' , ',new.paterno,' , ',new.materno,' , ',new.password,' , ',new.sexo, ' , ',new.fechaNacimiento,' , ',new.estado,' , ',new.mail)) */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `online_judge`.`usuarios_BEFORE_UPDATE` BEFORE UPDATE ON `usuarios` FOR EACH ROW
 INSERT INTO bitacora(host, usuario, operacion, modificado, tabla,oldValues,newValues)
 VALUES (SUBSTRING(USER(), (INSTR(USER(),'@')+1)), SUBSTRING(USER(),1,(instr(user(),'@')-1)), 'ACTUALIZAR', NOW(), 'USUARIOS',
 concat(OLD.aliasUsuario,' , ',OLD.nombre,' , ',OLD.paterno,' , ',OLD.materno,' , ',OLD.password,' , ',OLD.sexo, ' , ',OLD.fechaNacimiento,' , ',OLD.estado,' , ',OLD.mail),concat(NEW.aliasUsuario,' , ',new.nombre,' , ',new.paterno,' , ',new.materno,' , ',new.password,' , ',new.sexo, ' , ',new.fechaNacimiento,' , ',new.estado,' , ',new.mail)) */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `online_judge`.`usuarios_BEFORE_DELETE` BEFORE DELETE ON `usuarios` FOR EACH ROW
    INSERT INTO bitacora(host, usuario, operacion, modificado, tabla,oldValues,newValues)
 VALUES (SUBSTRING(USER(), (INSTR(USER(),'@')+1)), SUBSTRING(USER(),1,(instr(user(),'@')-1)), 'ELIMINAR', NOW(), 'USUARIOS',
 concat(OLD.aliasUsuario,' , ',OLD.nombre,' , ',OLD.paterno,' , ',OLD.materno,' , ',OLD.password,' , ',OLD.sexo, ' , ',OLD.fechaNacimiento,' , ',OLD.estado,' , ',OLD.mail),'NULL') */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Dumping routines for database 'online_judge'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-06-23 22:36:27
