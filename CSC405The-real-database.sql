CREATE DATABASE  IF NOT EXISTS `csc405testdb` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `csc405testdb`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: csc405testdb
-- ------------------------------------------------------
-- Server version	5.5.5-10.0.17-MariaDB

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
INSERT INTO `admin` VALUES ('admin001','marshmellows'),('admin002','ilovehiro015'),('admin003','papaisabitch');
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
  `Sender` int(11) DEFAULT NULL,
  `Seen` varchar(1) NOT NULL DEFAULT 'N',
  PRIMARY KEY (`ID`),
  KEY `employee_feedback_fk_idx` (`Sender`),
  CONSTRAINT `employee_feedback_fk` FOREIGN KEY (`Sender`) REFERENCES `employee` (`Employee_ID`) ON DELETE CASCADE ON UPDATE CASCADE
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
  `Feedback_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Question_ID` int(11) DEFAULT NULL,
  `Reply` varchar(1000) DEFAULT NULL,
  `Staff_ID` int(11) DEFAULT NULL,
  `Seen` varchar(45) DEFAULT 'N',
  PRIMARY KEY (`Feedback_ID`),
  KEY `question_feedback_fk_idx` (`Question_ID`),
  KEY `employee_feedback_fk_idx` (`Staff_ID`),
  CONSTRAINT `question_feedback_fk` FOREIGN KEY (`Question_ID`) REFERENCES `questioniare` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COMMENT='handles responses to questioniare';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `adminfeedback`
--

LOCK TABLES `adminfeedback` WRITE;
/*!40000 ALTER TABLE `adminfeedback` DISABLE KEYS */;
INSERT INTO `adminfeedback` VALUES (1,2,'Nothing',1111,'Y'),(2,2,'Nothing',1111,'N'),(3,1,'no',1111,'N'),(4,1,'Yes',1115,'N'),(5,2,'FU!',1111,'Y'),(6,2,'FU!',1115,'Y');
/*!40000 ALTER TABLE `adminfeedback` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `adminmesage_view`
--

DROP TABLE IF EXISTS `adminmesage_view`;
/*!50001 DROP VIEW IF EXISTS `adminmesage_view`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `adminmesage_view` AS SELECT 
 1 AS `FeedbackID`,
 1 AS `Question`,
 1 AS `Reply`,
 1 AS `staff_ID`*/;
SET character_set_client = @saved_cs_client;

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
  CONSTRAINT `patient_admission_fk` FOREIGN KEY (`patientID`) REFERENCES `patient` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='handles the creation of and admission which would be tracked through out the attendance of a patient';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admission`
--

LOCK TABLES `admission` WRITE;
/*!40000 ALTER TABLE `admission` DISABLE KEYS */;
INSERT INTO `admission` VALUES ('AD4566','P1112','2018-05-23','1111','1111',NULL,NULL),('AD4568','P1112','2018-05-22','1113','1112','1111','2018-05-23');
/*!40000 ALTER TABLE `admission` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `admission_view`
--

DROP TABLE IF EXISTS `admission_view`;
/*!50001 DROP VIEW IF EXISTS `admission_view`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `admission_view` AS SELECT 
 1 AS `addmissionID`,
 1 AS `patientID`,
 1 AS `Firstname`,
 1 AS `Surname`,
 1 AS `DOB`,
 1 AS `Mobile_number`,
 1 AS `Address`,
 1 AS `E-mail`,
 1 AS `Guardian`,
 1 AS `Weight`,
 1 AS `Height`,
 1 AS `Blood Group`,
 1 AS `Genotype`,
 1 AS `Status`,
 1 AS `Date_admitted`,
 1 AS `Admitting_staff`,
 1 AS `Doctor_assigned`,
 1 AS `Doctor_assignedID`,
 1 AS `Last_doctor_assigned`*/;
SET character_set_client = @saved_cs_client;

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
  KEY `patient_appointment_fk_idx` (`patient_ID`),
  CONSTRAINT `patient_appointment_fk` FOREIGN KEY (`patient_ID`) REFERENCES `patient` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE
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
  `addmission_ID` varchar(45) DEFAULT NULL,
  `issuer` varchar(45) DEFAULT NULL,
  `Bill_Summary` varchar(45) DEFAULT NULL,
  `amount_payable` varchar(45) DEFAULT NULL,
  `issued_date` date DEFAULT NULL,
  `date_due` date DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`billing_ID`),
  KEY `admission_billing_fk_idx` (`addmission_ID`),
  CONSTRAINT `admission_billing_fk` FOREIGN KEY (`addmission_ID`) REFERENCES `admission` (`addmissionid`) ON DELETE CASCADE ON UPDATE CASCADE
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
-- Temporary view structure for view `billing_view`
--

DROP TABLE IF EXISTS `billing_view`;
/*!50001 DROP VIEW IF EXISTS `billing_view`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `billing_view` AS SELECT 
 1 AS `billingID`,
 1 AS `admissionID`,
 1 AS `patientID`,
 1 AS `Firstname`,
 1 AS `Mobile_number`,
 1 AS `Contact_address`,
 1 AS `Email`,
 1 AS `Surname`,
 1 AS `Summary`,
 1 AS `amount_payable`,
 1 AS `date_due`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `diagnosis`
--

DROP TABLE IF EXISTS `diagnosis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `diagnosis` (
  `admission_id` varchar(45) NOT NULL,
  `current_diagnosis` varchar(1000) DEFAULT NULL,
  `doctor_ID` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`admission_id`),
  KEY `admission_diagnosis_fk_idx` (`admission_id`),
  CONSTRAINT `admission_diagnosis_fk` FOREIGN KEY (`admission_id`) REFERENCES `admission` (`addmissionid`) ON DELETE CASCADE ON UPDATE CASCADE
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
-- Temporary view structure for view `diagnosis_view`
--

DROP TABLE IF EXISTS `diagnosis_view`;
/*!50001 DROP VIEW IF EXISTS `diagnosis_view`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `diagnosis_view` AS SELECT 
 1 AS `admission_id`,
 1 AS `current_diagnosis`,
 1 AS `Employee_name`*/;
SET character_set_client = @saved_cs_client;

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
  `Employee_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Password` varchar(45) DEFAULT NULL,
  `Employee_name` varchar(150) DEFAULT NULL,
  `Employee_email` varchar(45) DEFAULT NULL,
  `Designation` varchar(45) DEFAULT NULL,
  `Role` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`Employee_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=1121 DEFAULT CHARSET=latin1 COMMENT='employee details';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employee`
--

LOCK TABLES `employee` WRITE;
/*!40000 ALTER TABLE `employee` DISABLE KEYS */;
INSERT INTO `employee` VALUES (1111,'d8ae5776067290c4712fa454006c8ec6','Samuel Boyega','boyegasam@gmail.com','doctor','Gynaecologist'),(1112,'e3e7f312a36e128c29a42352bb4ff8d7','Peter Quill','quillpeter@yahoo.com','doctor','Surgeon'),(1113,'373b9970b31572d090ada57d27df50b6','Annie Black','annieb@gmail.com','staff','Nurse'),(1114,'7409d682a6c618d9c543c3357ddc9569','Natasha Romanoff','blackwidow@shield.com','staff','Lab Scientist'),(1115,'cf858f80d8fa88e636f4b95885a21735','Okoye N\'Jobu','doramilajeokoye@wakanda.com','staff','Pharmacist'),(1116,'7371401da750b20197a12a4dd4a52a32','Fasipe Timilehin','fasipert556@yahoo.com','staff','Ward Assistant'),(1118,'3e027eebfd471aa497faca7252cd8600','Joda Opemipo','jodaopemipo@gmail.com','staff','Ward Assistant'),(1119,'8704daa9d50eb980c40510d39c931bfe','Joker Persona','personajsan@yahoo.com','doctor','Dermatologist'),(1120,'77004ea213d5fc71acf74a8c9c6795fb','Okedele Promise','okedelep@gmail.com','doctor','Surgeon');
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
INSERT INTO `patient` VALUES ('P1112','Joker','Valeska','1992-02-29','00000000001','Arkham Asylum','jerome@crazy.com','Batman','160kg','200cm','AB-','AA','Out-Patient');
/*!40000 ALTER TABLE `patient` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `patient_view`
--

DROP TABLE IF EXISTS `patient_view`;
/*!50001 DROP VIEW IF EXISTS `patient_view`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `patient_view` AS SELECT 
 1 AS `PatientID`,
 1 AS `Firstname`,
 1 AS `Surname`,
 1 AS `Phone_number`,
 1 AS `Address`,
 1 AS `E-mail`,
 1 AS `Status`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `priscriptions`
--

DROP TABLE IF EXISTS `priscriptions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `priscriptions` (
  `ID` int(11) NOT NULL,
  `admission_id` varchar(45) NOT NULL,
  `priscribed_drug` varchar(45) DEFAULT NULL,
  `priscription_information` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ID`,`admission_id`),
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
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='admin questioniare';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questioniare`
--

LOCK TABLES `questioniare` WRITE;
/*!40000 ALTER TABLE `questioniare` DISABLE KEYS */;
INSERT INTO `questioniare` VALUES (1,'Did you experience problems with our system'),(2,'Any other thing you want to tell us?');
/*!40000 ALTER TABLE `questioniare` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `staff_message`
--

DROP TABLE IF EXISTS `staff_message`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `staff_message` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Content` varchar(10000) DEFAULT NULL,
  `Staff_ID` varchar(45) DEFAULT NULL,
  `Seen` varchar(1) NOT NULL DEFAULT 'N',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COMMENT='messages sent to staffs from admin or a staff';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `staff_message`
--

LOCK TABLES `staff_message` WRITE;
/*!40000 ALTER TABLE `staff_message` DISABLE KEYS */;
INSERT INTO `staff_message` VALUES (1,'LMAO FU too a billion times','1115','Y');
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
-- Temporary view structure for view `staffmessage_view`
--

DROP TABLE IF EXISTS `staffmessage_view`;
/*!50001 DROP VIEW IF EXISTS `staffmessage_view`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `staffmessage_view` AS SELECT 
 1 AS `FeedbackID`,
 1 AS `Content`,
 1 AS `Staff`*/;
SET character_set_client = @saved_cs_client;

--
-- Temporary view structure for view `test_view`
--

DROP TABLE IF EXISTS `test_view`;
/*!50001 DROP VIEW IF EXISTS `test_view`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `test_view` AS SELECT 
 1 AS `ID`,
 1 AS `Employee_name`,
 1 AS `test_name`,
 1 AS `test_result`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `tests`
--

DROP TABLE IF EXISTS `tests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tests` (
  `ID` int(11) NOT NULL,
  `admission_id` varchar(45) NOT NULL,
  `issuing_staff` varchar(45) DEFAULT NULL,
  `test_name` varchar(45) DEFAULT NULL,
  `test_result` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`ID`,`admission_id`),
  KEY `admission_tests_fk_idx` (`admission_id`),
  CONSTRAINT `admission_tests_fk` FOREIGN KEY (`admission_id`) REFERENCES `admission` (`addmissionid`) ON DELETE CASCADE ON UPDATE CASCADE
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
-- Final view structure for view `adminmesage_view`
--

/*!50001 DROP VIEW IF EXISTS `adminmesage_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `adminmesage_view` AS select `m`.`Feedback_ID` AS `FeedbackID`,`q`.`Question` AS `Question`,`m`.`Reply` AS `Reply`,`m`.`Staff_ID` AS `staff_ID` from (`adminfeedback` `m` join `questioniare` `q`) where ((`q`.`ID` = `m`.`Question_ID`) and (`m`.`Seen` = 'N')) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `admission_view`
--

/*!50001 DROP VIEW IF EXISTS `admission_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `admission_view` AS select `ad`.`addmissionid` AS `addmissionID`,`ad`.`patientID` AS `patientID`,`p`.`Firstname` AS `Firstname`,`p`.`Surname` AS `Surname`,`p`.`Date_Of_Birth` AS `DOB`,`p`.`Phone_number` AS `Mobile_number`,`p`.`Address` AS `Address`,`p`.`E-mail` AS `E-mail`,`p`.`Guardian` AS `Guardian`,`p`.`Weight` AS `Weight`,`p`.`Height` AS `Height`,`p`.`Blood Group` AS `Blood Group`,`p`.`Genotype` AS `Genotype`,`p`.`Status` AS `Status`,`ad`.`Date_admitted` AS `Date_admitted`,(select `employee`.`Employee_name` from `employee` where (`employee`.`Employee_ID` = `ad`.`Admitting_staff`)) AS `Admitting_staff`,(select `employee`.`Employee_name` from `employee` where (`employee`.`Employee_ID` = `ad`.`Doctor_assigned`)) AS `Doctor_assigned`,`ad`.`Doctor_assigned` AS `Doctor_assignedID`,(select `employee`.`Employee_name` from `employee` where ((`ad`.`Last_doctor_assigned` is not null) and (`employee`.`Employee_ID` = `ad`.`Last_doctor_assigned`))) AS `Last_doctor_assigned` from (`admission` `ad` join `patient` `p`) where ((`ad`.`patientID` = `p`.`ID`) and isnull(`ad`.`Date_closed`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `billing_view`
--

/*!50001 DROP VIEW IF EXISTS `billing_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `billing_view` AS select `bill`.`billing_ID` AS `billingID`,`bill`.`addmission_ID` AS `admissionID`,`ad`.`patientID` AS `patientID`,`p`.`Firstname` AS `Firstname`,`p`.`Phone_number` AS `Mobile_number`,`p`.`Address` AS `Contact_address`,`p`.`E-mail` AS `Email`,`p`.`Surname` AS `Surname`,`bill`.`Bill_Summary` AS `Summary`,`bill`.`amount_payable` AS `amount_payable`,`bill`.`date_due` AS `date_due` from ((`billing` `bill` join `admission` `ad`) join `patient` `p`) where ((`bill`.`addmission_ID` = `ad`.`addmissionid`) and (`ad`.`patientID` = `p`.`ID`) and (`bill`.`status` = 'Not Paid')) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `diagnosis_view`
--

/*!50001 DROP VIEW IF EXISTS `diagnosis_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `diagnosis_view` AS select `d`.`admission_id` AS `admission_id`,`d`.`current_diagnosis` AS `current_diagnosis`,`e`.`Employee_name` AS `Employee_name` from (`diagnosis` `d` join `employee` `e`) where (`d`.`doctor_ID` = `e`.`Employee_ID`) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

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
/*!50001 VIEW `doctor_view` AS select `employee`.`Employee_ID` AS `Doctor_ID`,`employee`.`Password` AS `Password`,`employee`.`Employee_name` AS `Doctor_name`,`employee`.`Employee_email` AS `Doctor_email`,`employee`.`Role` AS `Type` from `employee` where (`employee`.`Designation` = 'doctor') */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `patient_view`
--

/*!50001 DROP VIEW IF EXISTS `patient_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `patient_view` AS select `patient`.`ID` AS `PatientID`,`patient`.`Firstname` AS `Firstname`,`patient`.`Surname` AS `Surname`,`patient`.`Phone_number` AS `Phone_number`,`patient`.`Address` AS `Address`,`patient`.`E-mail` AS `E-mail`,`patient`.`Status` AS `Status` from `patient` */;
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
/*!50001 VIEW `staff_view` AS select `employee`.`Employee_ID` AS `Staff_ID`,`employee`.`Password` AS `Password`,`employee`.`Employee_name` AS `Staff_name`,`employee`.`Employee_email` AS `Staff_email`,`employee`.`Role` AS `Position` from `employee` where (`employee`.`Designation` = 'staff') */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `staffmessage_view`
--

/*!50001 DROP VIEW IF EXISTS `staffmessage_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `staffmessage_view` AS select `m`.`ID` AS `FeedbackID`,`m`.`Content` AS `Content`,`m`.`Staff_ID` AS `Staff` from `staff_message` `m` where (`m`.`Seen` = 'N') */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `test_view`
--

/*!50001 DROP VIEW IF EXISTS `test_view`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `test_view` AS select `t`.`ID` AS `ID`,`e`.`Employee_name` AS `Employee_name`,`t`.`test_name` AS `test_name`,`t`.`test_result` AS `test_result` from (`tests` `t` join `employee` `e`) where (`t`.`issuing_staff` = `e`.`Employee_ID`) */;
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

-- Dump completed on 2018-05-27 16:05:57
