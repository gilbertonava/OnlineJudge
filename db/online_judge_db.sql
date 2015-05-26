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
/*!40000 ALTER TABLE `administrador` ENABLE KEYS */;
UNLOCK TABLES;

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
/*!40000 ALTER TABLE `alumno` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `alumno_has_examen`
--

DROP TABLE IF EXISTS `alumno_has_examen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alumno_has_examen` (
  `alumno_idUsuario` int(11) NOT NULL,
  `examen_idexamen` int(11) NOT NULL,
  PRIMARY KEY (`alumno_idUsuario`,`examen_idexamen`),
  KEY `fk_alumno_has_examen_examen1_idx` (`examen_idexamen`),
  KEY `fk_alumno_has_examen_alumno1_idx` (`alumno_idUsuario`),
  CONSTRAINT `fk_alumno_has_examen_alumno1` FOREIGN KEY (`alumno_idUsuario`) REFERENCES `alumno` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_alumno_has_examen_examen1` FOREIGN KEY (`examen_idexamen`) REFERENCES `examen` (`idexamen`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alumno_has_examen`
--

LOCK TABLES `alumno_has_examen` WRITE;
/*!40000 ALTER TABLE `alumno_has_examen` DISABLE KEYS */;
/*!40000 ALTER TABLE `alumno_has_examen` ENABLE KEYS */;
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
INSERT INTO `docente` VALUES (1,'1102PEMUJO23');
/*!40000 ALTER TABLE `docente` ENABLE KEYS */;
UNLOCK TABLES;

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
  `horaInicio` timestamp NOT NULL,
  `horaFin` timestamp NOT NULL,
  `idMateria` int(11) NOT NULL,
  `EstadoExamen` varchar(45) NOT NULL,
  PRIMARY KEY (`idexamen`),
  KEY `idMateria_idx` (`idMateria`),
  CONSTRAINT `idMateria` FOREIGN KEY (`idMateria`) REFERENCES `materia` (`idmateria`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `examen`
--

LOCK TABLES `examen` WRITE;
/*!40000 ALTER TABLE `examen` DISABLE KEYS */;
/*!40000 ALTER TABLE `examen` ENABLE KEYS */;
UNLOCK TABLES;

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
  CONSTRAINT `idDocente` FOREIGN KEY (`idDocente`) REFERENCES `docente` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `materia`
--

LOCK TABLES `materia` WRITE;
/*!40000 ALTER TABLE `materia` DISABLE KEYS */;
/*!40000 ALTER TABLE `materia` ENABLE KEYS */;
UNLOCK TABLES;

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
  CONSTRAINT `maestro` FOREIGN KEY (`idDocente`) REFERENCES `docente` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proyecto`
--

LOCK TABLES `proyecto` WRITE;
/*!40000 ALTER TABLE `proyecto` DISABLE KEYS */;
INSERT INTO `proyecto` VALUES (56,'49f929ddb6fbcd181d86e1307a7e1cfaf062d5c6_@_@_8_razones_para_cambiar_a_IBM_DB2.pdf','BAJA','ACTIVO',1,'A+B'),(57,'8fc4bb72c068fdb41cb19c2b8975e4fcc9400ba3_@_@_Faster problem solving in Java with heuristic search.pdf','BAJA','ACTIVO',1,'Fibonacci'),(58,'a3242ae2b80d8a8e8d4fa3606c8ab1c9435385e8_@_@_pc2v9AdminGuide.pdf','MEDIA','ACTIVO',1,'Cunting Cows');
/*!40000 ALTER TABLE `proyecto` ENABLE KEYS */;
UNLOCK TABLES;

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
  PRIMARY KEY (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'PEPE','JOSE ANDRES','PEREZ','MURILLO','PEMUJO123','M','1978-12-23','ACTIVO');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-05-25 22:09:21
