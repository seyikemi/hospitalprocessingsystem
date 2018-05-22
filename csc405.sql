CREATE DATABASE  IF NOT EXISTS `csc405testdb` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `csc405testdb`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: csc405testdb
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.19-MariaDB

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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  PRIMARY KEY (`username`,`password`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Admin username and password table';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin_messages`
--

DROP TABLE IF EXISTS `admin_messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_messages` (
  `ID` int(11) NOT NULL,
  `Feedback` varchar(10000) DEFAULT NULL,
  `Sender` varchar(45) DEFAULT NULL,
  `Seen` varchar(1) NOT NULL DEFAULT 'N',
  PRIMARY KEY (`ID`),
  KEY `staff_message_fk_idx` (`Sender`),
  CONSTRAINT `staff_message_fk` FOREIGN KEY (`Sender`) REFERENCES `employee` (`Staff_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_messages`
--

LOCK TABLES `admin_messages` WRITE;
/*!40000 ALTER TABLE `admin_messages` DISABLE KEYS */;
/*!40000 ALTER TABLE `admin_messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `adminfeedback`
--

DROP TABLE IF EXISTS `adminfeedback`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `adminfeedback` (
  `ID` int(11) NOT NULL,
  `Question_ID` int(11) DEFAULT NULL,
  `Reply` varchar(1000) DEFAULT NULL,
  `Staff_ID` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `staff_feedback_fk_idx` (`Staff_ID`),
  KEY `questioniare_feedback_fk_idx` (`Question_ID`),
  CONSTRAINT `questioniare_feedback_fk` FOREIGN KEY (`Question_ID`) REFERENCES `questioniare` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `staff_feedback_fk` FOREIGN KEY (`Staff_ID`) REFERENCES `employee` (`Staff_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='handles responses to questioniare';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `adminfeedback`
--

LOCK TABLES `adminfeedback` WRITE;
/*!40000 ALTER TABLE `adminfeedback` DISABLE KEYS */;
/*!40000 ALTER TABLE `adminfeedback` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admission`
--

DROP TABLE IF EXISTS `admission`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admission` (
  `addmissionid` varchar(50) NOT NULL,
  `patientID` varchar(45) DEFAULT NULL,
  `Date_admitted` date DEFAULT NULL,
  `Admitting_staff` varchar(45) DEFAULT NULL,
  `Doctor_assigned` varchar(45) DEFAULT NULL,
  `Last_doctor_assigned` varchar(45) DEFAULT NULL,
  `Date_closed` date DEFAULT NULL,
  PRIMARY KEY (`addmissionid`),
  KEY `patient_admission_fk_idx` (`patientID`),
  KEY `staff_admission_fk_idx` (`Admitting_staff`),
  KEY `doctor_admission_fk_idx` (`Doctor_assigned`),
  KEY `doctor1_admission_fk_idx` (`Last_doctor_assigned`),
  CONSTRAINT `doctor1_admission_fk` FOREIGN KEY (`Last_doctor_assigned`) REFERENCES `employee` (`Staff_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `doctor_admission_fk` FOREIGN KEY (`Doctor_assigned`) REFERENCES `employee` (`Staff_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `patient_admission_fk` FOREIGN KEY (`patientID`) REFERENCES `patient` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `staff_admission_fk` FOREIGN KEY (`Admitting_staff`) REFERENCES `employee` (`Staff_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='handles the creation of and admission which would be tracked through out the attendance of a patient';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admission`
--

LOCK TABLES `admission` WRITE;
/*!40000 ALTER TABLE `admission` DISABLE KEYS */;
/*!40000 ALTER TABLE `admission` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `appointments`
--

DROP TABLE IF EXISTS `appointments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `appointments` (
  `appointment_ID` varchar(45) NOT NULL,
  `issuer` varchar(45) DEFAULT NULL,
  `patient_ID` varchar(45) DEFAULT NULL,
  `appointment_date` date DEFAULT NULL,
  PRIMARY KEY (`appointment_ID`),
  KEY `staff_appointment_fk_idx` (`issuer`),
  KEY `patient_appointment_fk_idx` (`patient_ID`),
  CONSTRAINT `patient_appointment_fk` FOREIGN KEY (`patient_ID`) REFERENCES `patient` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `staff_appointment_fk` FOREIGN KEY (`issuer`) REFERENCES `employee` (`Staff_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='handles appointments with doctors';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `appointments`
--

LOCK TABLES `appointments` WRITE;
/*!40000 ALTER TABLE `appointments` DISABLE KEYS */;
/*!40000 ALTER TABLE `appointments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `billing`
--

DROP TABLE IF EXISTS `billing`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `billing` (
  `billing_ID` int(11) NOT NULL,
  `addmission_ID` varchar(45) NOT NULL,
  `issuer` varchar(45) DEFAULT NULL,
  `patient_ID` varchar(45) DEFAULT NULL,
  `Bill_Summary` varchar(45) DEFAULT NULL,
  `amount_payable` varchar(45) DEFAULT NULL,
  `issued_date` date DEFAULT NULL,
  `date_due` date DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`billing_ID`,`addmission_ID`),
  KEY `admission_billing_fk_idx` (`addmission_ID`),
  KEY `staff_billing_fk_idx` (`issuer`),
  KEY `patient_billing_fk_idx` (`patient_ID`),
  CONSTRAINT `admission_billing_fk` FOREIGN KEY (`addmission_ID`) REFERENCES `admission` (`addmissionid`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `patient_billing_fk` FOREIGN KEY (`patient_ID`) REFERENCES `patient` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `staff_billing_fk` FOREIGN KEY (`issuer`) REFERENCES `employee` (`Staff_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='handles all forms of billing to a particular patient on a perticular admission';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `billing`
--

LOCK TABLES `billing` WRITE;
/*!40000 ALTER TABLE `billing` DISABLE KEYS */;
/*!40000 ALTER TABLE `billing` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `diagnosis`
--

DROP TABLE IF EXISTS `diagnosis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `diagnosis` (
  `ID` int(11) NOT NULL,
  `admission_id` varchar(45) DEFAULT NULL,
  `current_diagnosis` varchar(1000) DEFAULT NULL,
  `doctor_ID` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `admission_diagnosis_fk_idx` (`admission_id`),
  KEY `doctor_diagnosis_fk_idx` (`doctor_ID`),
  CONSTRAINT `admission_diagnosis_fk` FOREIGN KEY (`admission_id`) REFERENCES `admission` (`addmissionid`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `doctor_diagnosis_fk` FOREIGN KEY (`doctor_ID`) REFERENCES `employee` (`Staff_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='keeps track of diagnosis details on a prticular admission';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `diagnosis`
--

LOCK TABLES `diagnosis` WRITE;
/*!40000 ALTER TABLE `diagnosis` DISABLE KEYS */;
/*!40000 ALTER TABLE `diagnosis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `doctor_view`
--

DROP TABLE IF EXISTS `doctor_view`;
/*!50001 DROP VIEW IF EXISTS `doctor_view`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `doctor_view` AS SELECT 
 1 AS `Doctor_ID`,
 1 AS `Password`,
 1 AS `Doctor_name`,
 1 AS `Doctor_email`,
 1 AS `Type`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employee` (
  `Staff_ID` varchar(45) NOT NULL,
  `Password` varchar(45) DEFAULT NULL,
  `Staff_name` varchar(150) DEFAULT NULL,
  `Employee_email` varchar(45) DEFAULT NULL,
  `Designation` varchar(45) DEFAULT NULL,
  `Role` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Staff_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='employee details';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employee`
--

LOCK TABLES `employee` WRITE;
/*!40000 ALTER TABLE `employee` DISABLE KEYS */;
/*!40000 ALTER TABLE `employee` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `messages` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) DEFAULT NULL,
  `E-mail` varchar(45) DEFAULT NULL,
  `Content` varchar(10000) DEFAULT NULL,
  `Seen` varchar(1) NOT NULL DEFAULT 'N',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='messages from the landing page, seen is if a doctor has attended to it';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paitientrecord`
--

DROP TABLE IF EXISTS `paitientrecord`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `paitientrecord` (
  `idpaitientrecord` int(11) NOT NULL,
  PRIMARY KEY (`idpaitientrecord`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='keeps infor about last stuff about the paitent since last check out/ dissmission';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paitientrecord`
--

LOCK TABLES `paitientrecord` WRITE;
/*!40000 ALTER TABLE `paitientrecord` DISABLE KEYS */;
/*!40000 ALTER TABLE `paitientrecord` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `patient`
--

DROP TABLE IF EXISTS `patient`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `patient` (
  `ID` varchar(500) NOT NULL,
  `Firstname` varchar(45) DEFAULT NULL,
  `Surname` varchar(45) DEFAULT NULL,
  `Date_Of_Birth` date DEFAULT NULL,
  `Phone_number` varchar(45) DEFAULT NULL,
  `Address` varchar(500) DEFAULT NULL,
  `E-mail` varchar(45) DEFAULT NULL,
  `Guardian` varchar(100) DEFAULT NULL,
  `Weight` varchar(45) DEFAULT NULL,
  `Height` varchar(45) DEFAULT NULL,
  `Blood Group` varchar(45) DEFAULT NULL,
  `Genotype` varchar(45) DEFAULT NULL,
  `Status` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='paitent details';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `patient`
--

LOCK TABLES `patient` WRITE;
/*!40000 ALTER TABLE `patient` DISABLE KEYS */;
/*!40000 ALTER TABLE `patient` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `priscriptions`
--

DROP TABLE IF EXISTS `priscriptions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `priscriptions` (
  `ID` int(11) NOT NULL,
  `admission_id` varchar(45) DEFAULT NULL,
  `priscribed_drug` varchar(45) DEFAULT NULL,
  `priscription_information` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `admission_priscription_fk_idx` (`admission_id`),
  CONSTRAINT `admission_priscription_fk` FOREIGN KEY (`admission_id`) REFERENCES `admission` (`addmissionid`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='handles all prescribed drugs for a patient on a particuler admission';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `priscriptions`
--

LOCK TABLES `priscriptions` WRITE;
/*!40000 ALTER TABLE `priscriptions` DISABLE KEYS */;
/*!40000 ALTER TABLE `priscriptions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `questioniare`
--

DROP TABLE IF EXISTS `questioniare`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `questioniare` (
  `ID` int(11) NOT NULL,
  `Question` varchar(150) DEFAULT NULL,
  `Date_Created` date DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='admin questioniare';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questioniare`
--

LOCK TABLES `questioniare` WRITE;
/*!40000 ALTER TABLE `questioniare` DISABLE KEYS */;
/*!40000 ALTER TABLE `questioniare` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `staff_message`
--

DROP TABLE IF EXISTS `staff_message`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `staff_message` (
  `ID` int(11) NOT NULL,
  `Content` varchar(10000) DEFAULT NULL,
  `Staff_ID` varchar(45) DEFAULT NULL,
  `Seen` varchar(1) NOT NULL DEFAULT 'N',
  PRIMARY KEY (`ID`),
  KEY `message_staff_fk_idx` (`Staff_ID`),
  CONSTRAINT `message_staff_fk` FOREIGN KEY (`Staff_ID`) REFERENCES `employee` (`Staff_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='messages sent to staffs from admin or a staff';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `staff_message`
--

LOCK TABLES `staff_message` WRITE;
/*!40000 ALTER TABLE `staff_message` DISABLE KEYS */;
/*!40000 ALTER TABLE `staff_message` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `staff_view`
--

DROP TABLE IF EXISTS `staff_view`;
/*!50001 DROP VIEW IF EXISTS `staff_view`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `staff_view` AS SELECT 
 1 AS `Staff_ID`,
 1 AS `Password`,
 1 AS `Staff_name`,
 1 AS `Staff_email`,
 1 AS `Position`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `tests`
--

DROP TABLE IF EXISTS `tests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tests` (
  `ID` int(11) NOT NULL,
  `admission_id` varchar(45) DEFAULT NULL,
  `issuing_staff` varchar(45) DEFAULT NULL,
  `test_name` varchar(45) DEFAULT NULL,
  `test_result` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  KEY `admission_test_fk_idx` (`admission_id`),
  KEY `staff_test_fk_idx` (`issuing_staff`),
  CONSTRAINT `admission_test_fk` FOREIGN KEY (`admission_id`) REFERENCES `admission` (`addmissionid`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `staff_test_fk` FOREIGN KEY (`issuing_staff`) REFERENCES `employee` (`Staff_ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='handles information about a test on a perticular patient on a particuler admission';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tests`
--

LOCK TABLES `tests` WRITE;
/*!40000 ALTER TABLE `tests` DISABLE KEYS */;
/*!40000 ALTER TABLE `tests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Final view structure for view `doctor_view`
--

/*!50001 DROP VIEW IF EXISTS `doctor_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `doctor_view` AS select `employee`.`Staff_ID` AS `Doctor_ID`,`employee`.`Password` AS `Password`,`employee`.`Staff_name` AS `Doctor_name`,`employee`.`Employee_email` AS `Doctor_email`,`employee`.`Role` AS `Type` from `employee` where (`employee`.`Designation` = 'doctor') */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `staff_view`
--

/*!50001 DROP VIEW IF EXISTS `staff_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `staff_view` AS select `employee`.`Staff_ID` AS `Staff_ID`,`employee`.`Password` AS `Password`,`employee`.`Staff_name` AS `Staff_name`,`employee`.`Employee_email` AS `Staff_email`,`employee`.`Role` AS `Position` from `employee` where (`employee`.`Designation` = 'staff') */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-05-20 17:36:13
