-- MySQL dump 10.13  Distrib 5.1.37, for debian-linux-gnu (i486)
--
-- Host: 127.0.0.1    Database: bankapp
-- ------------------------------------------------------
-- Server version	5.1.37-1ubuntu5.1

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
-- Table structure for table `accounttype`
--

DROP TABLE IF EXISTS `accounttype`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `accounttype` (
  `accounttypeid` int(2) unsigned NOT NULL AUTO_INCREMENT,
  `servicecategoryid` int(2) unsigned NOT NULL,
  `servicetypeid` int(2) unsigned NOT NULL,
  `accountname` varchar(50) NOT NULL,
  PRIMARY KEY (`accounttypeid`),
  UNIQUE KEY `avoidduplicaterows` (`servicecategoryid`,`servicetypeid`,`accountname`),
  KEY `servicecategoryid` (`servicecategoryid`),
  KEY `servicetypeid` (`servicetypeid`),
  CONSTRAINT `accounttype_ibfk_1` FOREIGN KEY (`servicecategoryid`) REFERENCES `servicecategory` (`servicecategoryid`),
  CONSTRAINT `accounttype_ibfk_2` FOREIGN KEY (`servicetypeid`) REFERENCES `servicetype` (`servicetypeid`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accounttype`
--

LOCK TABLES `accounttype` WRITE;
/*!40000 ALTER TABLE `accounttype` DISABLE KEYS */;
INSERT INTO `accounttype` VALUES (1,1,1,'Powerchequing Account'),(2,1,2,'Money Master Savings Account'),(3,1,3,'US Dollar Account'),(4,1,4,'Credit Card No-Fee Value VISA'),(5,1,5,'Basic Line of Credit'),(13,1,6,'GIC(12mos) with Flex for RSPs Account'),(14,1,6,'GIC(18mos) with Flex for RSPs Account'),(9,1,6,'GIC(24mos) with Flex for RSPs Account'),(6,1,6,'GIC(6mos) with Flex for RSPs Account'),(15,1,7,'GIC(12mos) with Flex for TFSAs Account'),(16,1,7,'GIC(18mos) with Flex for TFSAs Account'),(17,1,7,'GIC(24mos) with Flex for TFSAs Account'),(7,1,7,'GIC(6mos) with Flex for TFSAs Account'),(8,1,8,'Accidental Death Insurance - 1'),(18,1,8,'Accidental Death Insurance - 2'),(19,1,8,'Accidental Death Insurance - 3'),(20,1,8,'Accidental Death Insurance - 4'),(10,2,1,'Basic Business Chequing Account'),(11,2,2,'Basic Business Savings Account'),(12,2,3,'Basic Business Foreign Currency Account');
/*!40000 ALTER TABLE `accounttype` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `address`
--

DROP TABLE IF EXISTS `address`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `address` (
  `addressid` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `streetnumber` int(6) NOT NULL,
  `street` varchar(25) NOT NULL,
  `postalcode` varchar(7) NOT NULL,
  PRIMARY KEY (`addressid`),
  UNIQUE KEY `avoidduplicaterow` (`streetnumber`,`street`,`postalcode`),
  KEY `postalcode` (`postalcode`),
  CONSTRAINT `address_ibfk_1` FOREIGN KEY (`postalcode`) REFERENCES `postalcodes` (`postalcodes`)
) ENGINE=InnoDB AUTO_INCREMENT=10000589 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `address`
--

LOCK TABLES `address` WRITE;
/*!40000 ALTER TABLE `address` DISABLE KEYS */;
INSERT INTO `address` VALUES (10000050,24,'Avenue Mount Pleasant','H3D-4E3'),(10000040,34,'Joliette Street','G8H-1E2'),(10000026,47,'3rd Avenue','H2L-6E0'),(10000034,47,'McRae Street','J0H-8J2'),(10000044,54,'Stratford street','H3X-1F3'),(10000009,89,'Arnaud Avenue','H5E-9J3'),(10000002,98,'Hymus Ave.','H9R-1E2'),(10000587,240,'Westgate West','G1E-1A1'),(10000585,319,'Westgate West','G1E-1A1'),(10000036,345,'Rue Paradis','G1E-2E5'),(10000035,453,'Rue Paradis','G1E-5A4'),(10000042,674,'Avenue des Pins','H3G-1A4'),(10000037,674,'Lafayette Avenue','G8H-2E5'),(10000047,675,'Avenue des Pins','H3G-1A4'),(10000023,797,'Arsenault Avenue','H9G-7I1'),(10000028,824,'Laure Street','H4B-8G6'),(10000046,865,'Blvd. Rene Levesque west','H3H-2S4'),(10000043,1006,'Avenue Bonavista','H3G-1R7'),(10000004,1195,'Rue Paradis','G1N-4E2'),(10000001,1200,'Ste-Catherine','H2L-2G9'),(10000003,1234,'Front Street','M5C-2E9'),(10000045,1278,'Avenue Grosvenor','H3G-1E8'),(10000049,1400,'Maisonneuve blvd. west','H3G-1M8'),(10000315,1455,'deMaisonneuve West','H3G-1M8'),(10000041,1455,'Maisonneuve blvd. west','H3G-1M8'),(10000032,1715,'Arsenault Avenue','J8F-6H0'),(10000012,1736,'Lafayette Avenue','G8H-2A6'),(10000030,1861,'Lafayette Avenue','J6D-0F8'),(10000038,2345,'Joliette Street','G1E-1A1'),(10000021,2357,'Lafayette Avenue','H7E-5G9'),(10000027,2363,'Brochu Avenue','H3A-7F5'),(10000020,2763,'Joliette Street','H6D-0F8'),(10000010,3025,'Smith Street','H6F-0K4'),(10000016,3092,'3rd Avenue','H2L-6E0'),(10000025,3456,'Arsenault Avenue','H1K-5D9'),(10000022,3551,'McRae Street','H8F-6H0'),(10000017,3957,'Brochu Avenue','H3A-7F5'),(10000029,4158,'Joliette Avenue','J5C-9H7'),(10000024,5591,'Arnaud Street','H0H-8J2'),(10000015,5654,'Arsenault Avenue','H1K-5D9'),(10000048,5674,'Sherbrooke street west','H4J-5R5'),(10000008,5822,'Joliette Street','G4D-8I2'),(10000018,6643,'Laure Street','H4B-8G6'),(10000014,6702,'McRae Street','H0J-4C8'),(10000039,6756,'Lafayette Avenue','G8H-7T3'),(10000005,7632,'1st Street','H1A-5F9'),(10000013,7734,'Brochu Street','H9I-3B7'),(10000011,8089,'Laure Avenue','J7G-1L5'),(10000006,8380,'2nd Street','H2B-6G0'),(10000033,8684,'2nd Street','J9G-7I1'),(10000031,9600,'McRae Street','J7E-5G9'),(10000007,9768,'3rd Avenue','J3C-7H1'),(10000019,9923,'Arnaud Avenue','H5C-9H7');
/*!40000 ALTER TABLE `address` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bankingplans`
--

DROP TABLE IF EXISTS `bankingplans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bankingplans` (
  `accounttypeid` int(2) unsigned NOT NULL,
  `monthlyfee` decimal(4,2) NOT NULL,
  `freetransactions` int(3) unsigned NOT NULL,
  `transactionfee` decimal(4,2) NOT NULL,
  `overdraftamount` decimal(8,2) NOT NULL,
  `overdraftprotectionfee` decimal(5,2) NOT NULL,
  `minimumbalance` decimal(10,2) NOT NULL,
  `interestrate` decimal(3,2) NOT NULL,
  UNIQUE KEY `accounttypeid` (`accounttypeid`),
  UNIQUE KEY `avoidduplicaterows` (`monthlyfee`,`freetransactions`,`transactionfee`,`overdraftamount`,`overdraftprotectionfee`,`minimumbalance`,`interestrate`),
  CONSTRAINT `bankingplans_ibfk_1` FOREIGN KEY (`accounttypeid`) REFERENCES `accounttype` (`accounttypeid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bankingplans`
--

LOCK TABLES `bankingplans` WRITE;
/*!40000 ALTER TABLE `bankingplans` DISABLE KEYS */;
INSERT INTO `bankingplans` VALUES (2,'0.00',0,'0.00','0.00','0.00','0.00','2.00'),(1,'4.00',20,'0.65','1000.00','5.00','0.00','0.00'),(11,'5.00',20,'1.00','500.00','20.00','0.00','2.00'),(3,'10.00',10,'0.99','0.00','0.00','0.00','0.00'),(12,'20.00',25,'2.00','0.00','0.00','500.00','1.00'),(10,'50.00',50,'1.00','5000.00','50.00','0.00','0.00');
/*!40000 ALTER TABLE `bankingplans` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `borrowingplans`
--

DROP TABLE IF EXISTS `borrowingplans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `borrowingplans` (
  `accounttypeid` int(2) unsigned NOT NULL,
  `creditlimit` decimal(10,2) NOT NULL,
  `monthlyfee` decimal(3,2) NOT NULL,
  `graceperiod` int(2) unsigned NOT NULL,
  `interestrate` decimal(4,2) NOT NULL,
  UNIQUE KEY `accounttypeid` (`accounttypeid`),
  UNIQUE KEY `avoidduplicaterows` (`creditlimit`,`monthlyfee`,`graceperiod`,`interestrate`),
  CONSTRAINT `borrowingplans_ibfk_1` FOREIGN KEY (`accounttypeid`) REFERENCES `accounttype` (`accounttypeid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `borrowingplans`
--

LOCK TABLES `borrowingplans` WRITE;
/*!40000 ALTER TABLE `borrowingplans` DISABLE KEYS */;
INSERT INTO `borrowingplans` VALUES (4,'500.00','0.00',21,'15.00'),(5,'50000.00','0.00',21,'3.25');
/*!40000 ALTER TABLE `borrowingplans` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `branch`
--

DROP TABLE IF EXISTS `branch`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `branch` (
  `branchid` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `managerid` int(8) unsigned NOT NULL,
  `openingdate` date NOT NULL,
  `openinghours` tinytext NOT NULL,
  `branchsclientid` int(8) unsigned NOT NULL,
  PRIMARY KEY (`branchid`),
  UNIQUE KEY `avoidduplicaterows` (`managerid`,`openingdate`,`branchsclientid`),
  KEY `managerid` (`managerid`),
  KEY `branchsclientid` (`branchsclientid`),
  CONSTRAINT `branch_ibfk_1` FOREIGN KEY (`managerid`) REFERENCES `employee` (`employeeid`),
  CONSTRAINT `branch_ibfk_2` FOREIGN KEY (`branchsclientid`) REFERENCES `client` (`clientid`)
) ENGINE=InnoDB AUTO_INCREMENT=10005 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `branch`
--

LOCK TABLES `branch` WRITE;
/*!40000 ALTER TABLE `branch` DISABLE KEYS */;
INSERT INTO `branch` VALUES (10001,20000001,'1990-01-01','Mon-Fri 10:00-17:00',54010001),(10002,20000002,'1992-01-01','Mon-Fri 10:00-17:00',54010002),(10003,20000003,'1994-01-01','Mon-Fri 10:00-17:00',54010003),(10004,20000004,'1995-01-01','Mon-Fri 10:00-17:00',54010004);
/*!40000 ALTER TABLE `branch` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `client` (
  `clientid` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `ssn` varchar(11) DEFAULT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `addressid` int(8) unsigned NOT NULL,
  `dateofbirth` date NOT NULL,
  `startdate` date NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`clientid`),
  UNIQUE KEY `avoidduplicaterows` (`ssn`,`lastname`),
  KEY `addressid` (`addressid`),
  CONSTRAINT `client_ibfk_1` FOREIGN KEY (`addressid`) REFERENCES `address` (`addressid`)
) ENGINE=InnoDB AUTO_INCREMENT=54010097 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `client`
--

LOCK TABLES `client` WRITE;
/*!40000 ALTER TABLE `client` DISABLE KEYS */;
INSERT INTO `client` VALUES (54010001,'NULL','Downtown Mtl','Branch 10001',10000001,'1990-01-01','1990-01-01',1),(54010002,'NULL','Montreal W.I.','Branch 10002',10000002,'1992-01-01','1992-01-01',1),(54010003,'NULL','Downtown T.O','Branch 10003',10000003,'1994-01-01','1994-01-01',1),(54010004,'NULL','Quebec  QC','Branch 10004',10000004,'1995-01-01','1995-01-01',1),(54010005,'214 586 216','Carla','Suarez',10000005,'1964-12-30','1990-11-05',1),(54010006,'218 741 532','Daniela','Hantuchova',10000006,'1972-11-08','2001-12-01',1),(54010007,'241 257 845','Flavia','Pennetta',10000007,'1959-02-14','2000-04-08',1),(54010008,'221 963 548','Arantxa','Parra',10000008,'1969-09-04','2003-10-24',1),(54010009,'254 284 541','Alisa','Kleybanova',10000009,'1982-02-21','2007-05-21',1),(54010010,'241 653 523','Kateryna','Bondarenko',10000010,'1979-02-11','1999-10-18',1),(54010011,'287 243 097','Caroline','Wozniacki',10000013,'1988-06-28','2003-09-07',1),(54010012,'298 835 908','Yanina','Wickmayer',10000016,'1990-08-03','2008-11-04',0),(54010013,'187 674 323','Mountainlake','University',10000041,'1954-05-11','1990-01-24',1),(54010014,'129 340 002','Highhill','Hospital',10000042,'1919-01-02','1991-02-17',1),(54010015,'265 336 987','Chantal','Wordsworth',10000043,'1945-07-05','1999-09-09',0),(54010016,'213 654 147','Oscar','Wilde',10000044,'1984-12-23','1998-03-20',1),(54010017,'284 149 589','Chander','Sai',10000045,'1977-04-28','2002-08-31',1),(54010018,'216 563 672','Web Weaver','Consultancy',10000046,'1999-08-05','1999-08-05',1),(54010019,'129 342 100','Adminstration',' Highhill Hospital',10000047,'1919-01-02','1991-02-17',1),(54010020,'229 058 741','Paulette','Bourgeois',10000048,'1970-02-16','2005-07-13',1),(54010021,'287 674 390','Human Resourses',' Mountainlake Univ.',10000049,'1954-05-11','1990-01-24',1),(54010022,'148 587 377','Edison','Albert',10000050,'1945-11-07','1999-08-14',1),(54010025,'265 336 987','Chantal','Wordsworth-Brown',10000315,'1945-07-05','1999-09-09',0),(54010026,'875 345 280','John','Smith',10000315,'1954-05-21','2010-03-15',1);
/*!40000 ALTER TABLE `client` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clientaccount`
--

DROP TABLE IF EXISTS `clientaccount`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clientaccount` (
  `clientaccountid` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `branchid` int(5) unsigned NOT NULL,
  `clientid` int(8) unsigned NOT NULL,
  `accounttypeid` int(2) unsigned NOT NULL,
  `currentbalance` decimal(10,2) NOT NULL DEFAULT '0.00',
  `availablebalance` decimal(10,2) NOT NULL DEFAULT '0.00',
  `status` int(1) NOT NULL,
  `openingdate` date NOT NULL,
  `closingdate` date DEFAULT NULL,
  PRIMARY KEY (`branchid`,`clientaccountid`),
  UNIQUE KEY `avoidduplicaterows` (`branchid`,`clientid`,`status`,`accounttypeid`,`currentbalance`,`availablebalance`,`openingdate`,`closingdate`),
  KEY `accounttypeid` (`accounttypeid`),
  KEY `clientid` (`clientid`),
  KEY `clientaccountid` (`clientaccountid`),
  CONSTRAINT `clientaccount_ibfk_1` FOREIGN KEY (`accounttypeid`) REFERENCES `accounttype` (`accounttypeid`),
  CONSTRAINT `clientaccount_ibfk_3` FOREIGN KEY (`clientid`) REFERENCES `client` (`clientid`),
  CONSTRAINT `clientaccount_ibfk_4` FOREIGN KEY (`branchid`) REFERENCES `branch` (`branchid`)
) ENGINE=InnoDB AUTO_INCREMENT=210004106 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientaccount`
--

LOCK TABLES `clientaccount` WRITE;
/*!40000 ALTER TABLE `clientaccount` DISABLE KEYS */;
INSERT INTO `clientaccount` VALUES (10000001,10001,54010001,2,'3500.00','3500.00',1,'2010-07-01',NULL),(10000003,10001,54010001,2,'4000.00','4000.00',1,'2010-01-01',NULL),(20000002,10001,54010002,2,'6500.00','6500.00',1,'2010-06-01',NULL),(110001001,10001,54010005,1,'4205.65','5205.65',1,'1990-11-05',NULL),(110001002,10001,54010009,1,'4800.30','5800.30',1,'2007-05-21',NULL),(110001003,10001,54010011,1,'2125.50','3125.50',1,'2003-09-07',NULL),(210001004,10001,54010013,11,'76239.05','76239.05',1,'1990-01-24',NULL),(210001005,10001,54010014,11,'34765.35','34765.35',1,'1991-02-17',NULL),(110001012,10001,54010015,1,'45.00','0.00',0,'1999-09-09','2007-05-01'),(10000002,10001,54010015,1,'356.00','1300.00',1,'2010-06-01',NULL),(210004015,10001,54010015,1,'760.00','200.00',1,'2010-06-01','0000-00-00'),(210004090,10001,54010015,2,'0.00','0.00',1,'2010-08-10','0000-00-00'),(110001022,10001,54010015,2,'4780.50','4500.00',1,'2007-05-01',NULL),(210004076,10001,54010015,4,'43.00','0.00',1,'2010-08-10','0000-00-00'),(210004105,10001,54010015,5,'0.00','0.00',1,'2010-08-11','0000-00-00'),(210004089,10001,54010015,6,'0.00','0.00',1,'2010-08-10','0000-00-00'),(210004103,10001,54010015,10,'20.00','0.00',1,'2010-08-10','0000-00-00'),(210004073,10001,54010015,19,'0.00','0.00',1,'2010-08-10','0000-00-00'),(110001019,10001,54010016,2,'14900.00','14900.00',1,'1998-03-20',NULL),(210004075,10001,54010016,5,'0.00','0.00',1,'2010-08-10','0000-00-00'),(210004074,10001,54010016,7,'0.00','0.00',1,'2010-08-10','0000-00-00'),(110001102,10001,54010017,2,'12000.00','12000.00',1,'2002-08-31',NULL),(210001014,10001,54010018,11,'45000.00','45000.00',1,'1999-08-05',NULL),(210001006,10001,54010019,10,'12980.99','12980.99',1,'1991-02-17',NULL),(110001090,10001,54010020,1,'5690.00','6690.00',1,'2005-07-13',NULL),(210001007,10001,54010021,10,'18540.45','18540.45',1,'1990-01-24',NULL),(110001039,10001,54010022,1,'3290.85','4290.85',1,'1999-08-14',NULL),(210004046,10001,54010026,5,'1342.53','1342.53',1,'2010-08-09','0000-00-00'),(210002001,10002,54010002,10,'86543.98','86543.98',1,'1992-01-01',NULL),(110002001,10002,54010006,1,'6456.13','7456.13',1,'2001-12-01',NULL),(110002002,10002,54010010,1,'2750.00','3750.00',1,'1999-10-18',NULL),(210003001,10003,54010003,10,'75089.07','75089.07',1,'1994-01-01',NULL),(110003001,10003,54010007,1,'2100.00','3100.00',1,'2000-04-08',NULL),(210004001,10004,54010004,10,'26403.68','26403.68',1,'1995-01-01',NULL),(110004001,10004,54010008,1,'5089.67','6089.67',1,'2003-10-24',NULL),(110004523,10004,54010008,7,'20000.00','20000.00',1,'2010-07-20',NULL),(110004002,10004,54010012,1,'0.00','0.00',0,'2008-11-04','2010-07-28');
/*!40000 ALTER TABLE `clientaccount` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clientlogin`
--

DROP TABLE IF EXISTS `clientlogin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clientlogin` (
  `clientid` int(8) unsigned NOT NULL,
  `passwd` varchar(20) NOT NULL,
  UNIQUE KEY `clientid` (`clientid`),
  CONSTRAINT `clientlogin_ibfk_1` FOREIGN KEY (`clientid`) REFERENCES `client` (`clientid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientlogin`
--

LOCK TABLES `clientlogin` WRITE;
/*!40000 ALTER TABLE `clientlogin` DISABLE KEYS */;
INSERT INTO `clientlogin` VALUES (54010001,'BroneDTm'),(54010002,'BrtwoWIm'),(54010003,'Br3dtto!'),(54010004,'Suc4Qccv'),(54010005,'hook23th'),(54010006,'yu87?E3R'),(54010007,'12Pu876BN'),(54010008,'su*gh45Y'),(54010009,'TR678$cad'),(54010010,'moneyMind'),(54010011,'Invest$@b'),(54010012,'try2bank!'),(54010013,'8A$$&pkebt'),(54010014,'we56#4have'),(54010015,'Hi89R!23'),(54010016,'hj67@gooey'),(54010017,'all4*moni!'),(54010018,'78babyto90'),(54010019,'root#beer'),(54010020,'alors9AC'),(54010021,'onYva96*'),(54010022,'45&ltrue');
/*!40000 ALTER TABLE `clientlogin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employee` (
  `employeeid` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `addressid` int(8) unsigned NOT NULL,
  `branchid` int(5) unsigned NOT NULL,
  `titleid` int(2) unsigned NOT NULL,
  `salary` double NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `timeoffid` int(5) unsigned NOT NULL,
  `status` int(1) unsigned NOT NULL,
  PRIMARY KEY (`employeeid`),
  UNIQUE KEY `avoidduplicaterows` (`addressid`,`branchid`,`titleid`,`salary`,`firstname`,`lastname`,`timeoffid`,`status`),
  KEY `addressid` (`addressid`),
  KEY `branchid` (`branchid`),
  KEY `titleid` (`titleid`),
  KEY `timeoffid` (`timeoffid`),
  CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`addressid`) REFERENCES `address` (`addressid`),
  CONSTRAINT `employee_ibfk_2` FOREIGN KEY (`branchid`) REFERENCES `branch` (`branchid`),
  CONSTRAINT `employee_ibfk_3` FOREIGN KEY (`titleid`) REFERENCES `employeetitle` (`titleid`),
  CONSTRAINT `employee_ibfk_4` FOREIGN KEY (`timeoffid`) REFERENCES `employeetimeoffplan` (`timeoffid`)
) ENGINE=InnoDB AUTO_INCREMENT=20000201 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employee`
--

LOCK TABLES `employee` WRITE;
/*!40000 ALTER TABLE `employee` DISABLE KEYS */;
INSERT INTO `employee` VALUES (20000001,10000005,10001,10,45000,'Carla','Suarez',10002,1),(20000039,10000005,10003,20,60000,'Carla','GotMarried',10002,1),(20000002,10000006,10002,10,110000,'Daniela','Hantuchova',10002,1),(20000003,10000007,10003,10,110000,'Flavia','Pennetta',10002,1),(20000004,10000008,10004,10,100000,'Arantxa','Parra',10003,1),(20000005,10000009,10001,20,33000,'Alisa','Kleybanova',10003,1),(20000006,10000010,10002,20,45000,'Kateryna','Bondarenko',10001,1),(20000007,10000011,10003,15,70000,'Jie','Zheng',10001,1),(20000008,10000012,10004,15,75000,'Francesca','Schiavone',10001,1),(20000009,10000013,10001,20,55000,'Caroline','Wozniacki',10004,1),(20000010,10000014,10002,20,50000,'Dominika','Cibulkova',10001,1),(20000011,10000015,10003,20,60000,'Sybille','Bammer',10001,1),(20000012,10000016,10001,15,34000,'Yanina','Wickmayer',10001,1),(20000013,10000017,10001,30,30000,'Olga','Govortsova',10001,1),(20000014,10000018,10001,15,60000,'Jo-Wilfried','Tsonga',10001,1),(20000015,10000019,10001,20,55000,'John','Isner',10001,1),(20000016,10000020,10001,15,40000,'Ernests','Gulbis',10001,1),(20000017,10000021,10001,20,45000,'Albert','Montanes',10001,1),(20000018,10000022,10002,20,50000,'Tommy','Robredo',10001,1),(20000019,10000023,10001,15,30000,'Sam','Querrey',10001,1),(20000020,10000024,10004,30,35000,'Eduardo','Schwank',10001,1),(20000021,10000025,10002,30,35000,'Brian','Blanchette',10001,1),(20000022,10000026,10002,20,50000,'Patsy','Keays',10001,1),(20000023,10000027,10002,30,32000,'Philipp','Petzschner',10001,1),(20000024,10000028,10002,30,35000,'Richard','Gasquet',10001,1),(20000025,10000029,10003,30,30000,'Gael','Monfils',10004,1),(20000026,10000030,10003,30,32000,'Ivan','Ljubicic',10004,1),(20000027,10000031,10002,30,25000,'Sabine','Lisicki',10004,1),(20000028,10000032,10001,20,60000,'Maria','Sharapova',10001,1),(20000029,10000033,10003,30,32000,'Venus','Williams',10001,1),(20000030,10000034,10002,20,60000,'Marcos','Baghdatis',10001,1),(20000031,10000035,10004,30,30000,'Feliciano','Lopez',10001,1),(20000032,10000036,10004,30,35000,'Mikhail','Youzhny',10001,1),(20000033,10000037,10002,20,65000,'Fernando','Verdasco',10001,1),(20000034,10000038,10004,30,30000,'Guillermo','Garcia-Lopez',10001,1),(20000035,10000039,10004,30,32000,'Rafael','Nadal',10001,1),(20000036,10000040,10004,30,35000,'Andy','Roddick',10001,1),(20000060,10000315,10004,30,30000,'Carla','GotMarried',10002,0),(20000197,10000585,10001,20,55000,'Lena','Zayikina',10002,0),(20000199,10000587,10001,15,70000,'Olga','shokodko',10002,1);
/*!40000 ALTER TABLE `employee` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employeelogin`
--

DROP TABLE IF EXISTS `employeelogin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employeelogin` (
  `employeeid` int(8) unsigned NOT NULL,
  `passwd` varchar(20) NOT NULL,
  UNIQUE KEY `employeeid` (`employeeid`),
  CONSTRAINT `employeelogin_ibfk_1` FOREIGN KEY (`employeeid`) REFERENCES `employee` (`employeeid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employeelogin`
--

LOCK TABLES `employeelogin` WRITE;
/*!40000 ALTER TABLE `employeelogin` DISABLE KEYS */;
INSERT INTO `employeelogin` VALUES (20000001,'csuar163'),(20000002,'dhant694'),(20000003,'fpenn683'),(20000004,'aparr183'),(20000005,'akley559'),(20000006,'kbond784'),(20000007,'jzhen419'),(20000008,'fschi542'),(20000009,'cwozn675'),(20000010,'dcibu596'),(20000011,'sbamm842'),(20000012,'ywick786'),(20000013,'ogovo720'),(20000014,'jtson328'),(20000015,'jisne365'),(20000016,'egulb105'),(20000017,'amont152'),(20000018,'trobr927'),(20000019,'squer412'),(20000020,'eschw130'),(20000021,'bblan784'),(20000022,'pkeay921'),(20000023,'ppetz354'),(20000024,'rgasq857'),(20000025,'gmonf813'),(20000026,'iljub598'),(20000027,'slisi213'),(20000028,'mshar213'),(20000029,'vwill892'),(20000030,'mbagh363'),(20000031,'flope723'),(20000032,'myouz727'),(20000033,'fverd415'),(20000034,'ggarc634'),(20000035,'rnada932'),(20000036,'arodd372');
/*!40000 ALTER TABLE `employeelogin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employeetimeoffhistory`
--

DROP TABLE IF EXISTS `employeetimeoffhistory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employeetimeoffhistory` (
  `employeeid` int(8) unsigned NOT NULL,
  `reason` varchar(20) NOT NULL,
  `startdateoff` date NOT NULL,
  `dayreturntowork` date NOT NULL,
  PRIMARY KEY (`employeeid`,`reason`,`startdateoff`,`dayreturntowork`),
  KEY `employeeid` (`employeeid`),
  CONSTRAINT `employeetimeoffhistory_ibfk_1` FOREIGN KEY (`employeeid`) REFERENCES `employee` (`employeeid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employeetimeoffhistory`
--

LOCK TABLES `employeetimeoffhistory` WRITE;
/*!40000 ALTER TABLE `employeetimeoffhistory` DISABLE KEYS */;
INSERT INTO `employeetimeoffhistory` VALUES (20000001,'family live','2010-02-02','2010-02-14'),(20000002,'vacation','2010-06-01','2010-06-25'),(20000003,'vacation','2010-06-01','2010-06-10'),(20000004,'vacation','2010-08-01','2010-08-10'),(20000005,'sick days','2010-08-01','2010-08-05'),(20000005,'vacation','2007-08-01','2007-08-30'),(20000005,'vacation','2008-07-01','2008-07-30'),(20000005,'vacation','2009-09-01','2009-09-30'),(20000006,'sick days','2010-03-01','2010-03-06'),(20000006,'sick days','2010-07-01','2010-07-03'),(20000007,'family live','2010-04-10','2010-04-15'),(20000007,'sick days','2010-05-03','2010-05-08'),(20000008,'family live','2010-05-15','2010-05-17'),(20000009,'family live','2010-06-17','2010-06-18'),(20000010,'sick days','2010-02-25','2010-02-26'),(20000011,'sick days','2010-02-05','2010-02-15'),(20000011,'sick days','2010-03-28','2010-03-30'),(20000011,'sick days','2010-06-01','2010-06-06'),(20000011,'vacation','2005-10-05','2005-10-25'),(20000012,'vacation','2010-07-01','2010-07-10'),(20000013,'vacation','2010-03-01','2010-03-15'),(20000014,'family live','2010-02-25','2010-02-26'),(20000014,'family live','2010-03-05','2010-03-09'),(20000014,'sick days','2010-06-10','2010-06-15');
/*!40000 ALTER TABLE `employeetimeoffhistory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employeetimeoffplan`
--

DROP TABLE IF EXISTS `employeetimeoffplan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employeetimeoffplan` (
  `timeoffid` int(5) unsigned NOT NULL AUTO_INCREMENT,
  `timeoffname` varchar(30) NOT NULL,
  `numberofdays` int(2) NOT NULL,
  PRIMARY KEY (`timeoffid`),
  UNIQUE KEY `avoidduplicaterows` (`timeoffname`,`numberofdays`)
) ENGINE=InnoDB AUTO_INCREMENT=10005 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employeetimeoffplan`
--

LOCK TABLES `employeetimeoffplan` WRITE;
/*!40000 ALTER TABLE `employeetimeoffplan` DISABLE KEYS */;
INSERT INTO `employeetimeoffplan` VALUES (10002,'branch manager plan',25),(10004,'probation plan',10),(10001,'regular plan',20),(10003,'senior plan',30);
/*!40000 ALTER TABLE `employeetimeoffplan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employeetitle`
--

DROP TABLE IF EXISTS `employeetitle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employeetitle` (
  `titleid` int(2) unsigned NOT NULL AUTO_INCREMENT,
  `titlename` varchar(25) NOT NULL,
  `basesalary` decimal(8,2) NOT NULL,
  PRIMARY KEY (`titleid`),
  UNIQUE KEY `avoidduplicaterows` (`titlename`,`basesalary`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employeetitle`
--

LOCK TABLES `employeetitle` WRITE;
/*!40000 ALTER TABLE `employeetitle` DISABLE KEYS */;
INSERT INTO `employeetitle` VALUES (15,'Assistant Manager','70000.00'),(20,'Banking Consultant','55000.00'),(10,'Branch Manager','100000.00'),(30,'Teller','30000.00');
/*!40000 ALTER TABLE `employeetitle` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employeeworkhistory`
--

DROP TABLE IF EXISTS `employeeworkhistory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employeeworkhistory` (
  `employeeid` int(8) unsigned NOT NULL,
  `branchid` int(5) unsigned NOT NULL,
  `startdate` date NOT NULL,
  `lastdate` date NOT NULL,
  `titleid` int(2) unsigned NOT NULL,
  `salary` decimal(8,2) NOT NULL,
  PRIMARY KEY (`employeeid`,`branchid`,`startdate`,`lastdate`,`titleid`,`salary`),
  KEY `branchid` (`branchid`),
  KEY `titleid` (`titleid`),
  CONSTRAINT `employeeworkhistory_ibfk_2` FOREIGN KEY (`titleid`) REFERENCES `employeetitle` (`titleid`),
  CONSTRAINT `employeeworkhistory_ibfk_1` FOREIGN KEY (`branchid`) REFERENCES `branch` (`branchid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employeeworkhistory`
--

LOCK TABLES `employeeworkhistory` WRITE;
/*!40000 ALTER TABLE `employeeworkhistory` DISABLE KEYS */;
INSERT INTO `employeeworkhistory` VALUES (20000001,10001,'2010-08-05','0000-00-00',10,'45000.00'),(20000005,10001,'2007-01-01','2010-08-05',30,'28000.00'),(20000005,10001,'2010-08-05','0000-00-00',20,'33000.00'),(20000009,10001,'2010-01-01','0000-00-00',20,'55000.00'),(20000012,10001,'2010-08-07','0000-00-00',15,'34000.00'),(20000013,10001,'2005-01-01','0000-00-00',30,'30000.00'),(20000014,10001,'2008-01-01','2008-12-31',30,'30000.00'),(20000014,10001,'2009-01-01','2010-08-05',20,'40000.00'),(20000014,10001,'2010-08-05','0000-00-00',15,'60000.00'),(20000015,10001,'2005-01-01','2010-08-08',30,'35000.00'),(20000015,10001,'2010-08-08','2010-08-10',20,'50000.00'),(20000015,10001,'2010-08-10','0000-00-00',20,'55000.00'),(20000016,10001,'2005-01-01','2010-08-09',30,'30000.00'),(20000016,10001,'2010-08-09','0000-00-00',15,'40000.00'),(20000017,10001,'2009-01-01','2009-05-31',30,'25000.00'),(20000017,10001,'2010-01-01','0000-00-00',20,'45000.00'),(20000018,10001,'2005-01-01','2010-08-10',30,'35000.00'),(20000019,10001,'2010-08-08','0000-00-00',15,'30000.00'),(20000028,10001,'2010-08-08','0000-00-00',20,'60000.00'),(20000197,10001,'2010-08-11','2010-08-11',20,'55000.00'),(20000199,10001,'2010-08-11','0000-00-00',15,'70000.00'),(20000002,10002,'2010-01-01','0000-00-00',10,'110000.00'),(20000006,10002,'2010-01-01','2010-08-05',30,'20000.00'),(20000006,10002,'2010-08-05','2010-08-09',20,'40000.00'),(20000006,10002,'2010-08-09','0000-00-00',20,'45000.00'),(20000010,10002,'2010-01-01','2010-08-11',20,'58000.00'),(20000010,10002,'2010-08-11','0000-00-00',20,'50000.00'),(20000018,10002,'2010-08-10','0000-00-00',20,'50000.00'),(20000019,10002,'2005-01-01','2010-08-08',30,'30000.00'),(20000021,10002,'2005-01-01','2010-08-08',30,'35000.00'),(20000021,10002,'2010-08-08','0000-00-00',20,'50000.00'),(20000022,10002,'2005-01-01','2010-08-08',30,'30000.00'),(20000022,10002,'2010-08-08','0000-00-00',20,'50000.00'),(20000023,10002,'2005-01-01','0000-00-00',30,'32000.00'),(20000024,10002,'2005-01-01','0000-00-00',30,'32000.00'),(20000024,10002,'2005-01-01','0000-00-00',30,'35000.00'),(20000027,10002,'2010-08-09','0000-00-00',30,'25000.00'),(20000030,10002,'2005-01-01','2010-08-07',30,'35000.00'),(20000030,10002,'2010-08-07','0000-00-00',20,'60000.00'),(20000033,10002,'2010-08-09','0000-00-00',20,'65000.00'),(20000003,10003,'2010-01-01','0000-00-00',10,'110000.00'),(20000007,10003,'2010-01-01','2010-08-05',15,'60000.00'),(20000007,10003,'2010-08-05','0000-00-00',15,'70000.00'),(20000011,10003,'2005-01-01','0000-00-00',20,'60000.00'),(20000025,10003,'2005-01-01','0000-00-00',30,'30000.00'),(20000026,10003,'2005-01-01','0000-00-00',30,'32000.00'),(20000027,10003,'2005-01-01','2010-08-09',30,'35000.00'),(20000028,10003,'2005-01-01','2010-08-08',30,'30000.00'),(20000029,10003,'2005-01-01','0000-00-00',30,'32000.00'),(20000039,10003,'2010-08-09','0000-00-00',20,'60000.00'),(20000059,10003,'2010-08-09','0000-00-00',15,'45000.00'),(20000004,10004,'2010-01-01','0000-00-00',10,'100000.00'),(20000008,10004,'2010-01-01','0000-00-00',15,'75000.00'),(20000012,10004,'2005-01-01','2010-08-07',20,'65000.00'),(20000020,10004,'2010-08-09','0000-00-00',30,'35000.00'),(20000032,10004,'2010-08-09','0000-00-00',30,'35000.00'),(20000034,10004,'2010-01-01','0000-00-00',30,'30000.00'),(20000035,10004,'2010-01-01','0000-00-00',30,'32000.00'),(20000036,10004,'2010-01-01','0000-00-00',30,'35000.00'),(20000060,10004,'2010-08-09','2010-08-09',30,'30000.00');
/*!40000 ALTER TABLE `employeeworkhistory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `insuranceplans`
--

DROP TABLE IF EXISTS `insuranceplans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `insuranceplans` (
  `accounttypeid` int(2) unsigned NOT NULL,
  `coverage` decimal(10,2) NOT NULL,
  `monthlypremium` decimal(8,2) NOT NULL,
  UNIQUE KEY `accounttypeid` (`accounttypeid`),
  CONSTRAINT `insuranceplans_ibfk_1` FOREIGN KEY (`accounttypeid`) REFERENCES `accounttype` (`accounttypeid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `insuranceplans`
--

LOCK TABLES `insuranceplans` WRITE;
/*!40000 ALTER TABLE `insuranceplans` DISABLE KEYS */;
INSERT INTO `insuranceplans` VALUES (8,'50000.00','5.83'),(18,'100000.00','11.67'),(19,'150000.00','17.50'),(20,'200000.00','23.50');
/*!40000 ALTER TABLE `insuranceplans` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `investmentplans`
--

DROP TABLE IF EXISTS `investmentplans`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `investmentplans` (
  `accounttypeid` int(2) unsigned NOT NULL,
  `investmentterm` int(3) unsigned NOT NULL,
  `interestrate` decimal(4,2) NOT NULL,
  UNIQUE KEY `accounttypeid` (`accounttypeid`),
  CONSTRAINT `investmentplans_ibfk_1` FOREIGN KEY (`accounttypeid`) REFERENCES `accounttype` (`accounttypeid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `investmentplans`
--

LOCK TABLES `investmentplans` WRITE;
/*!40000 ALTER TABLE `investmentplans` DISABLE KEYS */;
INSERT INTO `investmentplans` VALUES (6,6,'1.00'),(7,6,'1.00'),(9,24,'2.00'),(13,12,'1.50'),(14,18,'1.75'),(15,12,'1.50'),(16,18,'1.75'),(17,24,'2.00');
/*!40000 ALTER TABLE `investmentplans` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log`
--

DROP TABLE IF EXISTS `log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `log` (
  `logId` int(11) NOT NULL AUTO_INCREMENT,
  `timestampoflog` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `message` varchar(200) NOT NULL,
  PRIMARY KEY (`logId`)
) ENGINE=InnoDB AUTO_INCREMENT=547 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log`
--

LOCK TABLES `log` WRITE;
/*!40000 ALTER TABLE `log` DISABLE KEYS */;
INSERT INTO `log` VALUES (1,'2010-08-11 17:59:17','testfromconsole'),(2,'2010-08-11 18:00:31','testfromconsole'),(3,'2010-08-11 18:00:33','testfromconsole'),(4,'2010-08-11 18:00:45','testfromconsole'),(5,'2010-08-11 18:01:41','testfromconsole'),(6,'2010-08-11 18:03:41','testfromconsole'),(7,'2010-08-11 18:05:41','testfromconsole'),(8,'2010-08-11 18:07:01','testfromconsole1'),(9,'2010-08-11 18:07:04','testfromconsole4'),(10,'2010-08-11 18:07:41','testfromconsole41'),(11,'2010-08-11 18:09:41','testfromconsole41'),(12,'2010-08-11 18:11:41','testfromconsole41'),(13,'2010-08-11 18:26:01','testfromconsole1'),(14,'2010-08-11 18:26:02','testfromconsole2'),(15,'2010-08-11 18:26:03','testfromconsole3'),(16,'2010-08-11 18:26:04','testfromconsole4'),(17,'2010-08-11 18:26:05','testfromconsole5'),(18,'2010-08-11 18:26:06','testfromconsole6'),(19,'2010-08-11 18:26:07','testfromconsole7'),(20,'2010-08-11 18:26:07','testfromconsole7'),(21,'2010-08-11 18:26:08','testfromconsole8'),(22,'2010-08-11 18:26:09','testfromconsole9'),(23,'2010-08-11 18:26:09','testfromconsole9'),(24,'2010-08-11 18:26:10','testfromconsole10'),(25,'2010-08-11 18:26:11','testfromconsole11'),(26,'2010-08-11 18:26:12','testfromconsole12'),(27,'2010-08-11 18:26:13','testfromconsole13'),(28,'2010-08-11 18:26:14','testfromconsole14'),(29,'2010-08-11 18:26:15','testfromconsole15'),(30,'2010-08-11 18:26:16','testfromconsole16'),(31,'2010-08-11 18:26:17','testfromconsole17'),(32,'2010-08-11 18:26:18','testfromconsole18'),(33,'2010-08-11 18:26:19','testfromconsole19'),(34,'2010-08-11 18:26:20','testfromconsole20'),(35,'2010-08-11 18:26:21','testfromconsole21'),(36,'2010-08-11 18:26:22','testfromconsole22'),(37,'2010-08-11 18:26:23','testfromconsole23'),(38,'2010-08-11 18:26:24','testfromconsole24'),(39,'2010-08-11 18:26:25','testfromconsole25'),(40,'2010-08-11 18:26:26','testfromconsole26'),(41,'2010-08-11 18:26:27','testfromconsole27'),(42,'2010-08-11 18:26:28','testfromconsole28'),(43,'2010-08-11 18:26:29','testfromconsole29'),(44,'2010-08-11 18:26:30','testfromconsole30'),(45,'2010-08-11 18:26:31','testfromconsole31'),(46,'2010-08-11 18:26:32','testfromconsole32'),(47,'2010-08-11 18:26:33','testfromconsole33'),(48,'2010-08-11 18:26:34','testfromconsole34'),(49,'2010-08-11 18:26:35','testfromconsole35'),(50,'2010-08-11 18:26:36','testfromconsole36'),(51,'2010-08-11 18:26:37','testfromconsole37'),(52,'2010-08-11 18:26:38','testfromconsole38'),(53,'2010-08-11 18:26:39','testfromconsole39'),(54,'2010-08-11 18:26:40','testfromconsole40'),(55,'2010-08-11 18:26:41','testfromconsole41'),(56,'2010-08-11 18:26:42','testfromconsole42'),(57,'2010-08-11 18:26:43','testfromconsole43'),(58,'2010-08-11 18:26:44','testfromconsole44'),(59,'2010-08-11 18:26:45','testfromconsole45'),(60,'2010-08-11 18:26:46','testfromconsole46'),(61,'2010-08-11 18:26:47','testfromconsole47'),(62,'2010-08-11 18:26:48','testfromconsole48'),(63,'2010-08-11 18:26:49','testfromconsole49'),(64,'2010-08-11 18:26:50','testfromconsole50'),(65,'2010-08-11 18:26:51','testfromconsole51'),(66,'2010-08-11 18:26:52','testfromconsole52'),(67,'2010-08-11 18:26:53','testfromconsole53'),(68,'2010-08-11 18:26:54','testfromconsole54'),(69,'2010-08-11 18:26:55','testfromconsole55'),(70,'2010-08-11 18:26:56','testfromconsole56'),(71,'2010-08-11 18:26:57','testfromconsole57'),(72,'2010-08-11 18:26:58','testfromconsole58'),(73,'2010-08-11 18:26:59','testfromconsole59'),(74,'2010-08-11 18:27:00','testfromconsole0'),(75,'2010-08-11 18:27:01','testfromconsole1'),(76,'2010-08-11 18:27:02','testfromconsole2'),(77,'2010-08-11 18:27:03','testfromconsole3'),(78,'2010-08-11 18:27:04','testfromconsole4'),(79,'2010-08-11 18:27:05','testfromconsole5'),(80,'2010-08-11 18:27:06','testfromconsole6'),(81,'2010-08-11 18:27:07','testfromconsole7'),(82,'2010-08-11 18:27:08','testfromconsole8'),(83,'2010-08-11 18:27:09','testfromconsole9'),(84,'2010-08-11 18:27:10','testfromconsole10'),(85,'2010-08-11 18:27:11','testfromconsole11'),(86,'2010-08-11 18:27:12','testfromconsole12'),(87,'2010-08-11 18:27:13','testfromconsole13'),(88,'2010-08-11 18:27:14','testfromconsole14'),(89,'2010-08-11 18:27:15','testfromconsole15'),(90,'2010-08-11 18:27:16','testfromconsole16'),(91,'2010-08-11 18:27:17','testfromconsole17'),(92,'2010-08-11 18:27:18','testfromconsole18'),(93,'2010-08-11 18:27:19','testfromconsole19'),(94,'2010-08-11 18:27:20','testfromconsole20'),(95,'2010-08-11 18:27:21','testfromconsole21'),(96,'2010-08-11 18:27:22','testfromconsole22'),(97,'2010-08-11 18:27:23','testfromconsole23'),(98,'2010-08-11 18:27:24','testfromconsole24'),(99,'2010-08-11 18:27:25','testfromconsole25'),(100,'2010-08-11 18:27:26','testfromconsole26'),(101,'2010-08-11 18:27:27','testfromconsole27'),(102,'2010-08-11 18:27:28','testfromconsole28'),(103,'2010-08-11 18:27:29','testfromconsole29'),(104,'2010-08-11 18:27:30','testfromconsole30'),(105,'2010-08-11 18:27:31','testfromconsole31'),(106,'2010-08-11 18:27:32','testfromconsole32'),(107,'2010-08-11 18:27:33','testfromconsole33'),(108,'2010-08-11 18:27:34','testfromconsole34'),(109,'2010-08-11 18:27:35','testfromconsole35'),(110,'2010-08-11 18:27:36','testfromconsole36'),(111,'2010-08-11 18:27:37','testfromconsole37'),(112,'2010-08-11 18:27:38','testfromconsole38'),(113,'2010-08-11 18:27:39','testfromconsole39'),(114,'2010-08-11 18:27:40','testfromconsole40'),(115,'2010-08-11 18:27:41','testfromconsole41'),(116,'2010-08-11 18:27:42','testfromconsole42'),(117,'2010-08-11 18:27:43','testfromconsole43'),(118,'2010-08-11 18:27:44','testfromconsole44'),(119,'2010-08-11 18:27:45','testfromconsole45'),(120,'2010-08-11 18:27:46','testfromconsole46'),(121,'2010-08-11 18:27:47','testfromconsole47'),(122,'2010-08-11 18:27:48','testfromconsole48'),(123,'2010-08-11 18:27:49','testfromconsole49'),(124,'2010-08-11 18:27:50','testfromconsole50'),(125,'2010-08-11 18:27:51','testfromconsole51'),(126,'2010-08-11 18:27:52','testfromconsole52'),(127,'2010-08-11 18:27:53','testfromconsole53'),(128,'2010-08-11 18:27:54','testfromconsole54'),(129,'2010-08-11 18:27:55','testfromconsole55'),(130,'2010-08-11 18:27:56','testfromconsole56'),(131,'2010-08-11 18:27:57','testfromconsole57'),(132,'2010-08-11 18:27:58','testfromconsole58'),(133,'2010-08-11 18:27:59','testfromconsole59'),(134,'2010-08-11 18:28:00','testfromconsole0'),(135,'2010-08-11 18:28:01','testfromconsole1'),(136,'2010-08-11 18:28:02','testfromconsole2'),(137,'2010-08-11 18:28:03','testfromconsole3'),(138,'2010-08-11 18:28:04','testfromconsole4'),(139,'2010-08-11 18:28:05','testfromconsole5'),(140,'2010-08-11 18:28:06','testfromconsole6'),(141,'2010-08-11 18:28:07','testfromconsole7'),(142,'2010-08-11 18:28:08','testfromconsole8'),(143,'2010-08-11 18:28:09','testfromconsole9'),(144,'2010-08-11 18:28:10','testfromconsole10'),(145,'2010-08-11 18:28:11','testfromconsole11'),(146,'2010-08-11 18:28:12','testfromconsole12'),(147,'2010-08-11 18:28:13','testfromconsole13'),(148,'2010-08-11 18:28:14','testfromconsole14'),(149,'2010-08-11 18:28:15','testfromconsole15'),(150,'2010-08-11 18:28:16','testfromconsole16'),(151,'2010-08-11 18:28:17','testfromconsole17'),(152,'2010-08-11 18:28:18','testfromconsole18'),(153,'2010-08-11 18:28:19','testfromconsole19'),(154,'2010-08-11 18:28:20','testfromconsole20'),(155,'2010-08-11 18:28:21','testfromconsole21'),(156,'2010-08-11 18:28:22','testfromconsole22'),(157,'2010-08-11 18:28:23','testfromconsole23'),(158,'2010-08-11 18:28:24','testfromconsole24'),(159,'2010-08-11 18:28:25','testfromconsole25'),(160,'2010-08-11 18:28:26','testfromconsole26'),(161,'2010-08-11 18:28:27','testfromconsole27'),(162,'2010-08-11 18:28:28','testfromconsole28'),(163,'2010-08-11 18:28:29','testfromconsole29'),(164,'2010-08-11 18:28:30','testfromconsole30'),(165,'2010-08-11 18:28:31','testfromconsole31'),(166,'2010-08-11 18:28:32','testfromconsole32'),(167,'2010-08-11 18:28:33','testfromconsole33'),(168,'2010-08-11 18:28:34','testfromconsole34'),(169,'2010-08-11 18:28:35','testfromconsole35'),(170,'2010-08-11 18:28:36','testfromconsole36'),(171,'2010-08-11 18:28:37','testfromconsole37'),(172,'2010-08-11 18:28:38','testfromconsole38'),(173,'2010-08-11 18:28:39','testfromconsole39'),(174,'2010-08-11 18:28:40','testfromconsole40'),(175,'2010-08-11 18:28:41','testfromconsole41'),(176,'2010-08-11 18:28:42','testfromconsole42'),(177,'2010-08-11 18:28:43','testfromconsole43'),(178,'2010-08-11 18:28:44','testfromconsole44'),(179,'2010-08-11 18:28:45','testfromconsole45'),(180,'2010-08-11 18:28:46','testfromconsole46'),(181,'2010-08-11 18:28:47','testfromconsole47'),(182,'2010-08-11 18:28:48','testfromconsole48'),(183,'2010-08-11 18:28:49','testfromconsole49'),(184,'2010-08-11 18:28:50','testfromconsole50'),(185,'2010-08-11 18:28:51','testfromconsole51'),(186,'2010-08-11 18:28:52','testfromconsole52'),(187,'2010-08-11 18:28:53','testfromconsole53'),(188,'2010-08-11 18:28:54','testfromconsole54'),(189,'2010-08-11 18:28:55','testfromconsole55'),(190,'2010-08-11 18:28:56','testfromconsole56'),(191,'2010-08-11 18:28:57','testfromconsole57'),(192,'2010-08-11 18:28:58','testfromconsole58'),(193,'2010-08-11 18:28:59','testfromconsole59'),(194,'2010-08-11 18:29:00','testfromconsole0'),(195,'2010-08-11 18:29:01','testfromconsole1'),(196,'2010-08-11 18:29:02','testfromconsole2'),(197,'2010-08-11 18:29:03','testfromconsole3'),(198,'2010-08-11 18:29:04','testfromconsole4'),(199,'2010-08-11 18:29:05','testfromconsole5'),(200,'2010-08-11 18:29:06','testfromconsole6'),(201,'2010-08-11 18:29:07','testfromconsole7'),(202,'2010-08-11 18:29:08','testfromconsole8'),(203,'2010-08-11 18:29:09','testfromconsole9'),(204,'2010-08-11 18:29:10','testfromconsole10'),(205,'2010-08-11 18:29:11','testfromconsole11'),(206,'2010-08-11 18:29:12','testfromconsole12'),(207,'2010-08-11 18:29:13','testfromconsole13'),(208,'2010-08-11 18:29:14','testfromconsole14'),(209,'2010-08-11 18:29:15','testfromconsole15'),(210,'2010-08-11 18:29:16','testfromconsole16'),(211,'2010-08-11 18:29:17','testfromconsole17'),(212,'2010-08-11 18:29:18','testfromconsole18'),(213,'2010-08-11 18:29:19','testfromconsole19'),(214,'2010-08-11 18:29:20','testfromconsole20'),(215,'2010-08-11 18:29:21','testfromconsole21'),(216,'2010-08-11 18:29:22','testfromconsole22'),(217,'2010-08-11 18:29:23','testfromconsole23'),(218,'2010-08-11 18:29:24','testfromconsole24'),(219,'2010-08-11 18:29:25','testfromconsole25'),(220,'2010-08-11 18:29:26','testfromconsole26'),(221,'2010-08-11 18:29:27','testfromconsole27'),(222,'2010-08-11 18:29:28','testfromconsole28'),(223,'2010-08-11 18:29:29','testfromconsole29'),(224,'2010-08-11 18:29:30','testfromconsole30'),(225,'2010-08-11 18:29:31','testfromconsole31'),(226,'2010-08-11 18:29:32','testfromconsole32'),(227,'2010-08-11 18:29:33','testfromconsole33'),(228,'2010-08-11 18:29:34','testfromconsole34'),(229,'2010-08-11 18:29:35','testfromconsole35'),(230,'2010-08-11 18:29:36','testfromconsole36'),(231,'2010-08-11 18:29:37','testfromconsole37'),(232,'2010-08-11 18:29:38','testfromconsole38'),(233,'2010-08-11 18:29:39','testfromconsole39'),(234,'2010-08-11 18:29:40','testfromconsole40'),(235,'2010-08-11 18:29:41','testfromconsole41'),(236,'2010-08-11 18:29:42','testfromconsole42'),(237,'2010-08-11 18:29:43','testfromconsole43'),(238,'2010-08-11 18:29:44','testfromconsole44'),(239,'2010-08-11 18:29:45','testfromconsole45'),(240,'2010-08-11 18:29:46','testfromconsole46'),(241,'2010-08-11 18:29:47','testfromconsole47'),(242,'2010-08-11 18:29:48','testfromconsole48'),(243,'2010-08-11 18:29:49','testfromconsole49'),(244,'2010-08-11 18:29:50','testfromconsole50'),(245,'2010-08-11 18:29:51','testfromconsole51'),(246,'2010-08-11 18:29:52','testfromconsole52'),(247,'2010-08-11 18:29:53','testfromconsole53'),(248,'2010-08-11 18:29:54','testfromconsole54'),(249,'2010-08-11 18:29:55','testfromconsole55'),(250,'2010-08-11 18:29:56','testfromconsole56'),(251,'2010-08-11 18:29:57','testfromconsole57'),(252,'2010-08-11 18:29:58','testfromconsole58'),(253,'2010-08-11 18:29:59','testfromconsole59'),(254,'2010-08-11 18:30:00','testfromconsole0'),(255,'2010-08-11 18:30:01','testfromconsole1'),(256,'2010-08-11 18:30:02','testfromconsole2'),(257,'2010-08-11 18:30:03','testfromconsole3'),(258,'2010-08-11 18:30:04','testfromconsole4'),(259,'2010-08-11 18:30:05','testfromconsole5'),(260,'2010-08-11 18:30:06','testfromconsole6'),(261,'2010-08-11 18:30:07','testfromconsole7'),(262,'2010-08-11 18:30:08','testfromconsole8'),(263,'2010-08-11 18:30:09','testfromconsole9'),(264,'2010-08-11 18:30:10','testfromconsole10'),(265,'2010-08-11 18:30:11','testfromconsole11'),(266,'2010-08-11 18:30:12','testfromconsole12'),(267,'2010-08-11 18:30:13','testfromconsole13'),(268,'2010-08-11 18:30:14','testfromconsole14'),(269,'2010-08-11 18:30:15','testfromconsole15'),(270,'2010-08-11 18:30:16','testfromconsole16'),(271,'2010-08-11 18:30:17','testfromconsole17'),(272,'2010-08-11 18:30:18','testfromconsole18'),(273,'2010-08-11 18:30:19','testfromconsole19'),(274,'2010-08-11 18:30:20','testfromconsole20'),(275,'2010-08-11 18:30:21','testfromconsole21'),(276,'2010-08-11 18:30:22','testfromconsole22'),(277,'2010-08-11 18:30:23','testfromconsole23'),(278,'2010-08-11 18:30:24','testfromconsole24'),(279,'2010-08-11 18:30:25','testfromconsole25'),(280,'2010-08-11 18:30:26','testfromconsole26'),(281,'2010-08-11 18:30:27','testfromconsole27'),(282,'2010-08-11 18:30:28','testfromconsole28'),(283,'2010-08-11 18:30:29','testfromconsole29'),(284,'2010-08-11 18:30:30','testfromconsole30'),(285,'2010-08-11 18:30:31','testfromconsole31'),(286,'2010-08-11 18:30:32','testfromconsole32'),(287,'2010-08-11 18:30:33','testfromconsole33'),(288,'2010-08-11 18:30:34','testfromconsole34'),(289,'2010-08-11 18:30:35','testfromconsole35'),(290,'2010-08-11 18:30:36','testfromconsole36'),(291,'2010-08-11 18:30:37','testfromconsole37'),(292,'2010-08-11 18:30:38','testfromconsole38'),(293,'2010-08-11 18:30:39','testfromconsole39'),(294,'2010-08-11 18:30:40','testfromconsole40'),(295,'2010-08-11 18:30:41','testfromconsole41'),(296,'2010-08-11 18:30:42','testfromconsole42'),(297,'2010-08-11 18:30:43','testfromconsole43'),(298,'2010-08-11 18:30:44','testfromconsole44'),(299,'2010-08-11 18:30:45','testfromconsole45'),(300,'2010-08-11 18:30:46','testfromconsole46'),(301,'2010-08-11 18:30:47','testfromconsole47'),(302,'2010-08-11 18:30:48','testfromconsole48'),(303,'2010-08-11 18:30:48','testfromconsole48'),(304,'2010-08-11 18:30:49','testfromconsole49'),(305,'2010-08-11 18:30:50','testfromconsole50'),(306,'2010-08-11 18:30:51','testfromconsole51'),(307,'2010-08-11 18:30:52','testfromconsole52'),(308,'2010-08-11 18:30:53','testfromconsole53'),(309,'2010-08-11 18:30:54','testfromconsole54'),(310,'2010-08-11 18:30:55','testfromconsole55'),(311,'2010-08-11 18:30:56','testfromconsole56'),(312,'2010-08-11 18:30:57','testfromconsole57'),(313,'2010-08-11 18:30:58','testfromconsole58'),(314,'2010-08-11 18:30:59','testfromconsole59'),(315,'2010-08-11 18:31:00','testfromconsole0'),(316,'2010-08-11 18:31:01','testfromconsole1'),(317,'2010-08-11 18:31:02','testfromconsole2'),(318,'2010-08-11 18:31:03','testfromconsole3'),(319,'2010-08-11 18:31:04','testfromconsole4'),(320,'2010-08-11 18:31:05','testfromconsole5'),(321,'2010-08-11 18:31:06','testfromconsole6'),(322,'2010-08-11 18:31:07','testfromconsole7'),(323,'2010-08-11 18:31:08','testfromconsole8'),(324,'2010-08-11 18:31:09','testfromconsole9'),(325,'2010-08-11 18:31:10','testfromconsole10'),(326,'2010-08-11 18:31:11','testfromconsole11'),(327,'2010-08-11 18:31:12','testfromconsole12'),(328,'2010-08-11 18:31:13','testfromconsole13'),(329,'2010-08-11 18:31:14','testfromconsole14'),(330,'2010-08-11 18:31:15','testfromconsole15'),(331,'2010-08-11 18:31:16','testfromconsole16'),(332,'2010-08-11 18:31:17','testfromconsole17'),(333,'2010-08-11 18:31:18','testfromconsole18'),(334,'2010-08-11 18:31:19','testfromconsole19'),(335,'2010-08-11 18:31:20','testfromconsole20'),(336,'2010-08-11 18:31:21','testfromconsole21'),(337,'2010-08-11 18:31:22','testfromconsole22'),(338,'2010-08-11 18:31:23','testfromconsole23'),(339,'2010-08-11 18:31:24','testfromconsole24'),(340,'2010-08-11 18:31:25','testfromconsole25'),(341,'2010-08-11 18:31:26','testfromconsole26'),(342,'2010-08-11 18:31:27','testfromconsole27'),(343,'2010-08-11 18:31:28','testfromconsole28'),(344,'2010-08-11 18:31:29','testfromconsole29'),(345,'2010-08-11 18:31:30','testfromconsole30'),(346,'2010-08-11 18:31:31','testfromconsole31'),(347,'2010-08-11 18:31:32','testfromconsole32'),(348,'2010-08-11 18:31:33','testfromconsole33'),(349,'2010-08-11 18:31:34','testfromconsole34'),(350,'2010-08-11 18:31:35','testfromconsole35'),(351,'2010-08-11 18:31:36','testfromconsole36'),(352,'2010-08-11 18:31:37','testfromconsole37'),(353,'2010-08-11 18:31:38','testfromconsole38'),(354,'2010-08-11 18:31:39','testfromconsole39'),(355,'2010-08-11 18:31:40','testfromconsole40'),(356,'2010-08-11 18:31:41','testfromconsole41'),(357,'2010-08-11 18:31:42','testfromconsole42'),(358,'2010-08-11 18:31:43','testfromconsole43'),(359,'2010-08-11 18:31:44','testfromconsole44'),(360,'2010-08-11 18:31:45','testfromconsole45'),(361,'2010-08-11 18:31:46','testfromconsole46'),(362,'2010-08-11 18:31:47','testfromconsole47'),(363,'2010-08-11 18:31:48','testfromconsole48'),(364,'2010-08-11 18:31:49','testfromconsole49'),(365,'2010-08-11 18:31:50','testfromconsole50'),(366,'2010-08-11 18:31:51','testfromconsole51'),(367,'2010-08-11 18:31:52','testfromconsole52'),(368,'2010-08-11 18:31:53','testfromconsole53'),(369,'2010-08-11 18:31:54','testfromconsole54'),(370,'2010-08-11 18:31:55','testfromconsole55'),(371,'2010-08-11 18:31:56','testfromconsole56'),(372,'2010-08-11 18:31:57','testfromconsole57'),(373,'2010-08-11 18:31:58','testfromconsole58'),(374,'2010-08-11 18:31:59','testfromconsole59'),(375,'2010-08-11 18:32:00','testfromconsole0'),(376,'2010-08-11 18:32:01','testfromconsole1'),(377,'2010-08-11 18:32:02','testfromconsole2'),(378,'2010-08-11 18:32:03','testfromconsole3'),(379,'2010-08-11 18:32:04','testfromconsole4'),(380,'2010-08-11 18:32:05','testfromconsole5'),(381,'2010-08-11 18:32:06','testfromconsole6'),(382,'2010-08-11 18:32:07','testfromconsole7'),(383,'2010-08-11 18:32:08','testfromconsole8'),(384,'2010-08-11 18:32:09','testfromconsole9'),(385,'2010-08-11 18:32:10','testfromconsole10'),(386,'2010-08-11 18:32:11','testfromconsole11'),(387,'2010-08-11 18:32:12','testfromconsole12'),(388,'2010-08-11 18:32:13','testfromconsole13'),(389,'2010-08-11 18:32:14','testfromconsole14'),(390,'2010-08-11 18:32:15','testfromconsole15'),(391,'2010-08-11 18:32:16','testfromconsole16'),(392,'2010-08-11 18:32:17','testfromconsole17'),(393,'2010-08-11 18:32:18','testfromconsole18'),(394,'2010-08-11 18:32:19','testfromconsole19'),(395,'2010-08-11 18:32:20','testfromconsole20'),(396,'2010-08-11 18:32:21','testfromconsole21'),(397,'2010-08-11 18:32:22','testfromconsole22'),(398,'2010-08-11 18:32:23','testfromconsole23'),(399,'2010-08-11 18:32:24','testfromconsole24'),(400,'2010-08-11 18:32:25','testfromconsole25'),(401,'2010-08-11 18:32:26','testfromconsole26'),(402,'2010-08-11 18:32:27','testfromconsole27'),(403,'2010-08-11 18:32:28','testfromconsole28'),(404,'2010-08-11 18:32:29','testfromconsole29'),(405,'2010-08-11 18:32:30','testfromconsole30'),(406,'2010-08-11 18:32:31','testfromconsole31'),(407,'2010-08-11 18:32:32','testfromconsole32'),(408,'2010-08-11 18:32:33','testfromconsole33'),(409,'2010-08-11 18:32:34','testfromconsole34'),(410,'2010-08-11 18:32:35','testfromconsole35'),(411,'2010-08-11 18:32:36','testfromconsole36'),(412,'2010-08-11 18:32:37','testfromconsole37'),(413,'2010-08-11 18:32:38','testfromconsole38'),(414,'2010-08-11 18:32:39','testfromconsole39'),(415,'2010-08-11 18:32:40','testfromconsole40'),(416,'2010-08-11 18:32:41','testfromconsole41'),(417,'2010-08-11 18:32:42','testfromconsole42'),(418,'2010-08-11 18:32:43','testfromconsole43'),(419,'2010-08-11 18:32:44','testfromconsole44'),(420,'2010-08-11 18:32:45','testfromconsole45'),(421,'2010-08-11 18:32:46','testfromconsole46'),(422,'2010-08-11 18:32:47','testfromconsole47'),(423,'2010-08-11 18:32:48','testfromconsole48'),(424,'2010-08-11 18:32:49','testfromconsole49'),(425,'2010-08-11 18:32:50','testfromconsole50'),(426,'2010-08-11 18:32:51','testfromconsole51'),(427,'2010-08-11 18:32:52','testfromconsole52'),(428,'2010-08-11 18:32:53','testfromconsole53'),(429,'2010-08-11 18:32:54','testfromconsole54'),(430,'2010-08-11 18:32:55','testfromconsole55'),(431,'2010-08-11 18:32:56','testfromconsole56'),(432,'2010-08-11 18:32:57','testfromconsole57'),(433,'2010-08-11 18:32:58','testfromconsole58'),(434,'2010-08-11 18:32:59','testfromconsole59'),(435,'2010-08-11 18:33:00','testfromconsole0'),(436,'2010-08-11 18:33:01','testfromconsole1'),(437,'2010-08-11 18:33:02','testfromconsole2'),(438,'2010-08-11 18:33:03','testfromconsole3'),(439,'2010-08-11 18:33:04','testfromconsole4'),(440,'2010-08-11 18:33:05','testfromconsole5'),(441,'2010-08-11 18:33:06','testfromconsole6'),(442,'2010-08-11 18:33:07','testfromconsole7'),(443,'2010-08-11 18:33:08','testfromconsole8'),(444,'2010-08-11 18:33:09','testfromconsole9'),(445,'2010-08-11 18:33:10','testfromconsole10'),(446,'2010-08-11 18:33:11','testfromconsole11'),(447,'2010-08-11 18:33:12','testfromconsole12'),(448,'2010-08-11 18:33:13','testfromconsole13'),(449,'2010-08-11 18:33:14','testfromconsole14'),(450,'2010-08-11 18:33:15','testfromconsole15'),(451,'2010-08-11 18:33:16','testfromconsole16'),(452,'2010-08-11 18:33:17','testfromconsole17'),(453,'2010-08-11 18:33:18','testfromconsole18'),(454,'2010-08-11 18:33:19','testfromconsole19'),(455,'2010-08-11 18:33:20','testfromconsole20'),(456,'2010-08-11 18:33:21','testfromconsole21'),(457,'2010-08-11 18:33:22','testfromconsole22'),(458,'2010-08-11 18:33:23','testfromconsole23'),(459,'2010-08-11 18:33:24','testfromconsole24'),(460,'2010-08-11 18:33:25','testfromconsole25'),(461,'2010-08-11 18:33:26','testfromconsole26'),(462,'2010-08-11 18:33:27','testfromconsole27'),(463,'2010-08-11 18:33:28','testfromconsole28'),(464,'2010-08-11 18:33:29','testfromconsole29'),(465,'2010-08-11 18:33:30','testfromconsole30'),(466,'2010-08-11 18:33:31','testfromconsole31'),(467,'2010-08-11 18:33:32','testfromconsole32'),(468,'2010-08-11 18:33:33','testfromconsole33'),(469,'2010-08-11 18:33:34','testfromconsole34'),(470,'2010-08-11 18:33:35','testfromconsole35'),(471,'2010-08-11 18:33:36','testfromconsole36'),(472,'2010-08-11 18:33:37','testfromconsole37'),(473,'2010-08-11 18:33:38','testfromconsole38'),(474,'2010-08-11 18:33:39','testfromconsole39'),(475,'2010-08-11 18:33:40','testfromconsole40'),(476,'2010-08-11 18:33:41','testfromconsole41'),(477,'2010-08-11 18:33:42','testfromconsole42'),(478,'2010-08-11 18:33:43','testfromconsole43'),(479,'2010-08-11 18:33:44','testfromconsole44'),(480,'2010-08-11 18:33:45','testfromconsole45'),(481,'2010-08-11 18:33:46','testfromconsole46'),(482,'2010-08-11 18:33:47','testfromconsole47'),(483,'2010-08-11 18:33:48','testfromconsole48'),(484,'2010-08-11 18:33:49','testfromconsole49'),(485,'2010-08-11 18:33:50','testfromconsole50'),(486,'2010-08-11 18:33:51','testfromconsole51'),(487,'2010-08-11 18:33:52','testfromconsole52'),(488,'2010-08-11 18:33:53','testfromconsole53'),(489,'2010-08-11 18:33:54','testfromconsole54'),(490,'2010-08-11 18:33:55','testfromconsole55'),(491,'2010-08-11 18:33:56','testfromconsole56'),(492,'2010-08-11 18:33:57','testfromconsole57'),(493,'2010-08-11 18:33:58','testfromconsole58'),(494,'2010-08-11 18:33:59','testfromconsole59'),(495,'2010-08-11 18:34:00','testfromconsole0'),(496,'2010-08-11 18:34:01','testfromconsole1'),(497,'2010-08-11 18:34:02','testfromconsole2'),(498,'2010-08-11 18:34:03','testfromconsole3'),(499,'2010-08-11 18:34:04','testfromconsole4'),(500,'2010-08-11 18:34:05','testfromconsole5'),(501,'2010-08-11 18:34:06','testfromconsole6'),(502,'2010-08-11 18:34:07','testfromconsole7'),(503,'2010-08-11 18:34:08','testfromconsole8'),(504,'2010-08-11 18:34:09','testfromconsole9'),(505,'2010-08-11 18:34:10','testfromconsole10'),(506,'2010-08-11 18:34:11','testfromconsole11'),(507,'2010-08-11 18:34:12','testfromconsole12'),(508,'2010-08-11 18:34:13','testfromconsole13'),(509,'2010-08-11 18:34:14','testfromconsole14'),(510,'2010-08-11 18:34:15','testfromconsole15'),(511,'2010-08-11 18:34:16','testfromconsole16'),(512,'2010-08-11 18:34:17','testfromconsole17'),(513,'2010-08-11 18:34:18','testfromconsole18'),(514,'2010-08-11 18:34:19','testfromconsole19'),(515,'2010-08-11 18:34:20','testfromconsole20'),(516,'2010-08-11 18:34:21','testfromconsole21'),(517,'2010-08-11 18:34:22','testfromconsole22'),(518,'2010-08-11 18:34:23','testfromconsole23'),(519,'2010-08-11 18:34:24','testfromconsole24'),(520,'2010-08-11 18:34:25','testfromconsole25'),(521,'2010-08-11 18:34:26','testfromconsole26'),(522,'2010-08-11 18:34:27','testfromconsole27'),(523,'2010-08-11 18:34:28','testfromconsole28'),(524,'2010-08-11 18:34:29','testfromconsole29'),(525,'2010-08-11 18:34:30','testfromconsole30'),(526,'2010-08-11 18:34:31','testfromconsole31'),(527,'2010-08-11 18:34:32','testfromconsole32'),(528,'2010-08-11 18:34:33','testfromconsole33'),(529,'2010-08-11 18:34:34','testfromconsole34'),(530,'2010-08-11 18:34:35','testfromconsole35'),(531,'2010-08-11 18:34:36','testfromconsole36'),(532,'2010-08-11 18:34:37','testfromconsole37'),(533,'2010-08-11 18:34:38','testfromconsole38'),(534,'2010-08-11 18:34:39','testfromconsole39'),(535,'2010-08-11 18:34:40','testfromconsole40'),(536,'2010-08-11 18:34:41','testfromconsole41'),(537,'2010-08-11 18:34:42','testfromconsole42'),(538,'2010-08-11 18:34:43','testfromconsole43'),(539,'2010-08-11 18:34:44','testfromconsole44'),(540,'2010-08-11 18:34:45','testfromconsole45'),(541,'2010-08-11 18:34:46','testfromconsole46'),(542,'2010-08-11 18:34:47','testfromconsole47'),(543,'2010-08-11 18:34:48','testfromconsole48'),(544,'2010-08-11 18:34:49','testfromconsole49'),(545,'2010-08-11 18:34:50','testfromconsole50'),(546,'2010-08-11 18:34:51','testfromconsole51');
/*!40000 ALTER TABLE `log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `postalcodes`
--

DROP TABLE IF EXISTS `postalcodes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `postalcodes` (
  `postalcodes` varchar(7) NOT NULL,
  `city` varchar(30) NOT NULL,
  `province` varchar(15) NOT NULL,
  PRIMARY KEY (`postalcodes`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `postalcodes`
--

LOCK TABLES `postalcodes` WRITE;
/*!40000 ALTER TABLE `postalcodes` DISABLE KEYS */;
INSERT INTO `postalcodes` VALUES ('G1E-1A1','Quebec','Quebec'),('G1E-2E5','Quebec','Quebec'),('G1E-5A4','Quebec','Quebec'),('G1N-4E2','Quebec','Quebec'),('G4D-8I2','Quebec','Quebec'),('G4R-1Z7','Quebec','Quebec'),('G8H-1E2','Quebec','Quebec'),('G8H-2A6','Ste-Foy','Quebec'),('G8H-2E5','Ste-Foy','Quebec'),('G8H-7T3','Ste-Foy','Quebec'),('H0H-8J2','Montreal','Quebec'),('H0J-4C8','Lachine','Quebec'),('H1A-5F9','Montreal','Quebec'),('H1K-5D9','Westmount','Quebec'),('H1T-1A1','Beaconsfield','Quebec'),('H2B-6G0','Lachine','Quebec'),('H2L-2G9','Montreal','Quebec'),('H2L-6E0','Montreal','Quebec'),('H3A-7F5','Westmount','Quebec'),('H3D-4E3','Westmount','Quebec'),('H3G-1A4','Montreal','Quebec'),('H3G-1E8','Westmount','Quebec'),('H3G-1M8','Montreal','Quebec'),('H3G-1R7','Westmount','Quebec'),('H3H-2S4','Montreal','Quebec'),('H3K-1J3','Ville Marie2','Quebec'),('H3K-1J6','Montreal','Quebec'),('H3K-1J8','Montreal','Quebec'),('H3K-1J9','Montreal','Quebec'),('H3K-1Z2','Montreal','Quebec'),('H3X-1F3','Hampstead','Quebec'),('H4B-8G6','St-Hubert','Quebec'),('H4E-2E1','Ville Emard','QC'),('H4J-5R5','Montreal','Quebec'),('H5C-9H7','Lachine','Quebec'),('H5E-9J3','Montreal','Quebec'),('H6D-0F8','Laval','Quebec'),('H6F-0K4','Westmount','Quebec'),('H7E-5G9','Montreal','Quebec'),('H8F-6H0','Lachine','Quebec'),('H9G-7I1','Westmount','Quebec'),('H9I-3B7','Montreal','Quebec'),('H9R-1E2','Pointe-Claire Montreal','Quebec'),('J0H-8J2','Toronto','Ontario'),('J3C-7H1','Toronto','Ontario'),('J5C-9H7','Toronto','Ontario'),('J6D-0F8','Toronto','Ontario'),('J7E-5G9','Toronto','Ontario'),('J7G-1L5','Toronto','Ontario'),('J7Y-1R1','Toronto','Ontario'),('J8F-6H0','Toronto','Ontario'),('J9G-7I1','Toronto','Ontario'),('M5C-2E9','Toronto','Ontario');
/*!40000 ALTER TABLE `postalcodes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `service`
--

DROP TABLE IF EXISTS `service`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `service` (
  `serviceid` int(2) unsigned NOT NULL AUTO_INCREMENT,
  `servicename` varchar(25) NOT NULL,
  PRIMARY KEY (`serviceid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `service`
--

LOCK TABLES `service` WRITE;
/*!40000 ALTER TABLE `service` DISABLE KEYS */;
INSERT INTO `service` VALUES (1,'Banking'),(2,'Investment'),(3,'Insurance'),(4,'Borrowing');
/*!40000 ALTER TABLE `service` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servicecategory`
--

DROP TABLE IF EXISTS `servicecategory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `servicecategory` (
  `servicecategoryid` int(2) unsigned NOT NULL AUTO_INCREMENT,
  `servicecategoryname` varchar(10) NOT NULL,
  UNIQUE KEY `servicecategoryid` (`servicecategoryid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servicecategory`
--

LOCK TABLES `servicecategory` WRITE;
/*!40000 ALTER TABLE `servicecategory` DISABLE KEYS */;
INSERT INTO `servicecategory` VALUES (1,'Personal'),(2,'Business');
/*!40000 ALTER TABLE `servicecategory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servicetype`
--

DROP TABLE IF EXISTS `servicetype`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `servicetype` (
  `servicetypeid` int(2) unsigned NOT NULL AUTO_INCREMENT,
  `serviceid` int(2) unsigned NOT NULL,
  `servicetypename` varchar(25) NOT NULL,
  UNIQUE KEY `servicetypeid` (`servicetypeid`),
  UNIQUE KEY `avoidduplicaterows` (`serviceid`,`servicetypename`),
  KEY `serviceid` (`serviceid`),
  CONSTRAINT `servicetype_ibfk_1` FOREIGN KEY (`serviceid`) REFERENCES `service` (`serviceid`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servicetype`
--

LOCK TABLES `servicetype` WRITE;
/*!40000 ALTER TABLE `servicetype` DISABLE KEYS */;
INSERT INTO `servicetype` VALUES (1,1,'Chequing'),(3,1,'Foreign Currency'),(2,1,'Savings'),(6,2,'RSP'),(7,2,'TFSA'),(8,3,'Life'),(4,4,'Credit Cards'),(5,4,'Line Of Credit');
/*!40000 ALTER TABLE `servicetype` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transaction`
--

DROP TABLE IF EXISTS `transaction`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transaction` (
  `transactionid` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `branchid` int(5) unsigned NOT NULL,
  `accountid` int(8) unsigned NOT NULL,
  `date` date NOT NULL,
  `transactionfeecharged` decimal(2,2) DEFAULT NULL,
  `transactionfeetype` varchar(25) NOT NULL,
  `depositamount` decimal(10,2) DEFAULT NULL,
  `withdrawalamount` decimal(8,2) DEFAULT NULL,
  `balanceaftertransaction` decimal(10,2) NOT NULL,
  `transactiondescription` varchar(50) NOT NULL,
  `transperformedby` int(10) unsigned NOT NULL,
  PRIMARY KEY (`transactionid`),
  UNIQUE KEY `avoidduplicaterows` (`branchid`,`accountid`,`date`,`transactionfeecharged`,`transactionfeetype`,`depositamount`,`withdrawalamount`,`transactiondescription`,`transperformedby`,`balanceaftertransaction`),
  CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`branchid`, `accountid`) REFERENCES `clientaccount` (`branchid`, `clientaccountid`)
) ENGINE=InnoDB AUTO_INCREMENT=91300068 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transaction`
--

LOCK TABLES `transaction` WRITE;
/*!40000 ALTER TABLE `transaction` DISABLE KEYS */;
INSERT INTO `transaction` VALUES (91100001,10001,10000001,'2010-07-01','0.00','free transaction','5000.00',NULL,'5000.00','my first deposit on saving account',0),(91100002,10001,10000001,'2010-07-05','0.00','free transaction',NULL,'1000.00','4000.00','withdraw money for trip',0),(91100003,10001,10000001,'2010-07-10','0.00','free transaction',NULL,'1000.00','3000.00','withdraw money for trip',0),(91100004,10001,10000001,'2010-07-15','0.00','free transaction','500.00',NULL,'3500.00','deposit money left from trip',0),(91200001,10001,10000002,'2010-06-01','0.00','free transaction','1000.00',NULL,'1000.00','my first deposit on checking account',0),(91200002,10001,10000002,'2010-06-02','0.00','free transaction',NULL,'100.00','900.00','bill payment',0),(91200003,10001,10000002,'2010-06-03','0.00','free transaction',NULL,'200.00','700.00','bill payment',0),(91200004,10001,10000002,'2010-06-10','0.00','free transaction',NULL,'500.00','200.00','bill payment',0),(91200005,10001,10000002,'2010-06-15','0.00','free transaction','500.00',NULL,'700.00','my second deposit on checking account',0),(91300038,10001,10000002,'2010-08-10','0.00','free transaction',NULL,'0.23','170.35','Online Fund Transfer',20000001),(91300036,10001,10000002,'2010-08-10','0.00','free transaction',NULL,'0.23','170.58','Online Fund Transfer',20000001),(91300034,10001,10000002,'2010-08-10','0.00','free transaction',NULL,'0.23','170.81','Online Fund Transfer',20000001),(91300032,10001,10000002,'2010-08-10','0.00','free transaction',NULL,'0.23','171.04','Online Fund Transfer',20000001),(91300030,10001,10000002,'2010-08-10','0.00','free transaction',NULL,'0.23','171.27','Online Fund Transfer',20000001),(91300050,10001,10000002,'2010-08-10','0.00','free transaction',NULL,'0.55','482.00','Online Fund Transfer',54010015),(91300026,10001,10000002,'2010-08-10','0.00','free transaction',NULL,'3.00','167.00','Online Fund Transfer',54010015),(91300058,10001,10000002,'2010-08-10','0.00','free transaction',NULL,'3.00','386.00','Online Fund Transfer',54010015),(91300028,10001,10000002,'2010-08-10','0.00','free transaction',NULL,'4.50','162.50','Online Fund Transfer',20000001),(91300024,10001,10000002,'2010-08-10','0.00','free transaction',NULL,'5.00','170.00','Online Fund Transfer',54010015),(91300054,10001,10000002,'2010-08-10','0.00','free transaction',NULL,'100.00','382.00','Online Fund Transfer',54010015),(91300029,10001,10000002,'2010-08-10','0.00','free transaction','4.50',NULL,'171.50','Online Fund Transfer',20000001),(91300057,10001,10000002,'2010-08-10','0.00','free transaction','7.00',NULL,'389.00','Online Fund Transfer',54010015),(91300041,10001,10000002,'2010-08-10','0.00','free transaction','89.30',NULL,'259.65','Online Fund Transfer',20000001),(91300043,10001,10000002,'2010-08-10','0.00','free transaction','89.30',NULL,'348.95','Online Fund Transfer',20000001),(91300045,10001,10000002,'2010-08-10','0.00','free transaction','89.30',NULL,'438.25','Online Fund Transfer',20000001),(91300047,10001,10000002,'2010-08-10','0.00','free transaction','89.30',NULL,'527.55','Online Fund Transfer',20000001),(91300062,10001,10000002,'2010-08-11','0.00','free transaction',NULL,'10.00','476.00','Online Fund Transfer',54010015),(91300066,10001,10000002,'2010-08-11','0.00','free transaction',NULL,'20.00','356.00','Online Fund Transfer',54010015),(91300060,10001,10000002,'2010-08-11','0.00','free transaction',NULL,'100.00','286.00','Online Fund Transfer',54010015),(91300064,10001,10000002,'2010-08-11','0.00','free transaction',NULL,'100.00','376.00','Online Fund Transfer',54010015),(91300061,10001,10000002,'2010-08-11','0.00','free transaction','100.00',NULL,'486.00','Online Fund Transfer',54010015),(91300001,10001,10000003,'2010-01-01','0.00','free transaction','4000.00',NULL,'0.00','deposit money for future studing',0),(27,10001,110001012,'2007-05-01','0.00','Free transaction',NULL,'4500.00','0.00','Account transfer; Closed account ',0),(558,10001,110001019,'2010-08-01','0.00','Free transaction',NULL,'1329.00','0.00','Bill payment by telephone; To Mountainlake Univ.',0),(28,10001,110001022,'2007-05-01','0.00','Free transaction','4500.00',NULL,'0.00','Opened account tranferring money',0),(91300056,10001,110001022,'2010-08-10','0.00','free transaction',NULL,'7.00','4670.50','Online Fund Transfer',54010015),(91300046,10001,110001022,'2010-08-10','0.00','free transaction',NULL,'89.30','4676.95','Online Fund Transfer',20000001),(91300044,10001,110001022,'2010-08-10','0.00','free transaction',NULL,'89.30','4766.25','Online Fund Transfer',20000001),(91300042,10001,110001022,'2010-08-10','0.00','free transaction',NULL,'89.30','4855.55','Online Fund Transfer',20000001),(91300040,10001,110001022,'2010-08-10','0.00','free transaction',NULL,'89.30','4944.85','Online Fund Transfer',20000001),(91300031,10001,110001022,'2010-08-10','0.00','free transaction','0.23',NULL,'5033.23','Online Fund Transfer',20000001),(91300033,10001,110001022,'2010-08-10','0.00','free transaction','0.23',NULL,'5033.46','Online Fund Transfer',20000001),(91300035,10001,110001022,'2010-08-10','0.00','free transaction','0.23',NULL,'5033.69','Online Fund Transfer',20000001),(91300037,10001,110001022,'2010-08-10','0.00','free transaction','0.23',NULL,'5033.92','Online Fund Transfer',20000001),(91300039,10001,110001022,'2010-08-10','0.00','free transaction','0.23',NULL,'5034.15','Online Fund Transfer',20000001),(91300051,10001,110001022,'2010-08-10','0.00','free transaction','0.55',NULL,'4677.50','Online Fund Transfer',54010015),(91300027,10001,110001022,'2010-08-10','0.00','free transaction','3.00',NULL,'5033.00','Online Fund Transfer',54010015),(91300025,10001,110001022,'2010-08-10','0.00','free transaction','5.00',NULL,'5030.00','Online Fund Transfer',54010015),(91300063,10001,110001022,'2010-08-11','0.00','free transaction','10.00',NULL,'4680.50','Online Fund Transfer',54010015),(91300065,10001,110001022,'2010-08-11','0.00','free transaction','100.00',NULL,'4780.50','Online Fund Transfer',54010015),(531,10001,110001039,'2010-07-28','0.00','Free transaction',NULL,'124.00','0.00','Bill payment on ATM; To HydroQuebec',0),(543,10001,110001090,'2010-07-25','0.00','Free transaction',NULL,'79.00','0.00','Bill payment online; To HydroQuebec',0),(559,10001,210001004,'2010-08-02','0.00','Free transaction','1329.00',NULL,'0.00','Received payment by telephone; From Oscar Wilde',0),(476,10001,210001014,'2010-07-30','0.99','Service charges','33000.00','0.00','0.00','Check deposit on Mtl branch',0),(91300052,10001,210004015,'2010-08-10','0.00','free transaction',NULL,'40.00','660.00','Online Fund Transfer',54010015),(91300055,10001,210004015,'2010-08-10','0.00','free transaction','100.00',NULL,'760.00','Online Fund Transfer',54010015),(91300059,10001,210004076,'2010-08-10','0.00','free transaction','3.00',NULL,'43.00','Online Fund Transfer',54010015),(91300053,10001,210004076,'2010-08-10','0.00','free transaction','40.00',NULL,'40.00','Online Fund Transfer',54010015),(91300067,10001,210004103,'2010-08-11','0.00','free transaction','20.00',NULL,'20.00','Online Fund Transfer',54010015),(231,10004,110004002,'2010-07-28','0.00','Free transaction',NULL,'1454.56','0.00','On ATM; Closed account ',0);
/*!40000 ALTER TABLE `transaction` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2010-08-11 14:54:01
