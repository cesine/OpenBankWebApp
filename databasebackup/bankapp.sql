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
  KEY `servicecategoryid` (`servicecategoryid`),
  KEY `servicetypeid` (`servicetypeid`),
  CONSTRAINT `accounttype_ibfk_2` FOREIGN KEY (`servicetypeid`) REFERENCES `servicetype` (`servicetypeid`),
  CONSTRAINT `accounttype_ibfk_1` FOREIGN KEY (`servicecategoryid`) REFERENCES `servicecategory` (`servicecategoryid`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accounttype`
--

LOCK TABLES `accounttype` WRITE;
/*!40000 ALTER TABLE `accounttype` DISABLE KEYS */;
INSERT INTO `accounttype` VALUES (1,1,1,'Powerchequing Account'),(2,1,2,'Money Master Savings Account'),(3,1,3,'US Dollar Account'),(4,1,4,'Credit Card No-Fee Value VISA'),(5,1,5,'Basic Line of Credit'),(6,1,6,'GIC(6mos) with Flex for RSPs Account'),(7,1,7,'GIC(6mos) with Flex for TFSAs Account'),(8,1,8,'Accidental Death Insurance - 1'),(9,1,6,'GIC(24mos) with Flex for RSPs Account'),(10,2,1,'Basic Business Chequing Account'),(11,2,2,'Basic Business Savings Account'),(12,2,3,'Basic Business Foreign Currency Account'),(13,1,6,'GIC(12mos) with Flex for RSPs Account'),(14,1,6,'GIC(18mos) with Flex for RSPs Account'),(15,1,7,'GIC(12mos) with Flex for TFSAs Account'),(16,1,7,'GIC(18mos) with Flex for TFSAs Account'),(17,1,7,'GIC(24mos) with Flex for TFSAs Account'),(18,1,8,'Accidental Death Insurance - 2'),(19,1,8,'Accidental Death Insurance - 3'),(20,1,8,'Accidental Death Insurance - 4');
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
  KEY `postalcode` (`postalcode`),
  CONSTRAINT `address_ibfk_1` FOREIGN KEY (`postalcode`) REFERENCES `postalcodes` (`postalcodes`)
) ENGINE=InnoDB AUTO_INCREMENT=10000053 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `address`
--

LOCK TABLES `address` WRITE;
/*!40000 ALTER TABLE `address` DISABLE KEYS */;
INSERT INTO `address` VALUES (10000001,1200,'Ste-Catherine','H3K-1Z2'),(10000002,98,'Hymus Ave.','H1T-1A1'),(10000003,1234,'Front Street','J7Y-1R1'),(10000004,1195,'Rue Paradis','G4R-1Z7'),(10000005,7632,'1st Street','H1A-5F9'),(10000006,8380,'2nd Street','H2B-6G0'),(10000007,9768,'3rd Avenue','J3C-7H1'),(10000008,5822,'Joliette Street','G4D-8I2'),(10000009,89,'Arnaud Avenue','H5E-9J3'),(10000010,3025,'Smith Street','H6F-0K4'),(10000011,8089,'Laure Avenue','J7G-1L5'),(10000012,1736,'Lafayette Avenue','G8H-2A6'),(10000013,7734,'Brochu Street','H9I-3B7'),(10000014,6702,'McRae Street','H0J-4C8'),(10000015,5654,'Arsenault Avenue','H1K-5D9'),(10000016,3092,'3rd Avenue','H2L-6E0'),(10000017,3957,'Brochu Avenue','H3A-7F5'),(10000018,6643,'Laure Street','H4B-8G6'),(10000019,9923,'Arnaud Avenue','H5C-9H7'),(10000020,2763,'Joliette Street','H6D-0F8'),(10000021,2357,'Lafayette Avenue','H7E-5G9'),(10000022,3551,'McRae Street','H8F-6H0'),(10000023,797,'Arsenault Avenue','H9G-7I1'),(10000024,5591,'Arnaud Street','H0H-8J2'),(10000025,3456,'Arsenault Avenue','H1K-5D9'),(10000026,47,'3rd Avenue','H2L-6E0'),(10000027,2363,'Brochu Avenue','H3A-7F5'),(10000028,824,'Laure Street','H4B-8G6'),(10000029,4158,'Joliette Avenue','J5C-9H7'),(10000030,1861,'Lafayette Avenue','J6D-0F8'),(10000031,9600,'McRae Street','J7E-5G9'),(10000032,1715,'Arsenault Avenue','J8F-6H0'),(10000033,8684,'2nd Street','J9G-7I1'),(10000034,47,'McRae Street','J0H-8J2'),(10000035,453,'Rue Paradis','G1E-5A4'),(10000036,345,'Rue Paradis','G1E-2E5'),(10000037,674,'Lafayette Avenue','G8H-2E5'),(10000038,2345,'Joliette Street','G1E-1A1'),(10000039,6756,'Lafayette Avenue','G8H-7T3'),(10000040,34,'Joliette Street','G8H-1E2'),(10000041,1400,'Maisonneuve blvd. west','H3G-1M8'),(10000042,675,'Avenue des Pins','H3G-1A4'),(10000043,1006,'Avenue Bonavista','H3G-1R7'),(10000044,54,'Stratford street','H3X-1F3'),(10000045,1278,'Avenue Grosvenor','H3G-1E8'),(10000046,865,'Blvd. Rene Levesque west','H3H-2S4'),(10000047,675,'Avenue des Pins','H3G-1A4'),(10000048,5674,'Sherbrooke street west','H4J-5R5'),(10000049,1400,'Maisonneuve blvd. west','H3G-1M8'),(10000050,24,'Avenue Mount Pleasant','H3D-4E3');
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
  `transactionfee` decimal(2,2) NOT NULL,
  `overdraftamount` decimal(7,2) NOT NULL,
  `overdraftprotectionfee` decimal(3,2) NOT NULL,
  `minimumbalance` decimal(10,2) NOT NULL,
  `interestrate` decimal(2,2) NOT NULL,
  UNIQUE KEY `accounttypeid` (`accounttypeid`),
  CONSTRAINT `bankingplans_ibfk_1` FOREIGN KEY (`accounttypeid`) REFERENCES `accounttype` (`accounttypeid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bankingplans`
--

LOCK TABLES `bankingplans` WRITE;
/*!40000 ALTER TABLE `bankingplans` DISABLE KEYS */;
INSERT INTO `bankingplans` VALUES (1,'4.00',20,'0.65','1000.00','5.00','0.00','0.00'),(2,'0.00',0,'0.00','0.00','0.00','0.00','0.99'),(3,'10.00',10,'0.99','0.00','0.00','0.00','0.00'),(10,'0.00',0,'0.00','0.00','0.00','0.00','0.00'),(11,'0.00',0,'0.00','0.00','0.00','0.00','0.00'),(12,'0.00',0,'0.00','0.00','0.00','0.00','0.00');
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
  `branchid` int(5) unsigned NOT NULL,
  `managerid` int(8) unsigned NOT NULL,
  `openingdate` date NOT NULL,
  `openinghours` tinytext NOT NULL,
  `branchsclientid` int(8) unsigned NOT NULL,
  PRIMARY KEY (`branchid`),
  KEY `managerid` (`managerid`),
  KEY `branchsclientid` (`branchsclientid`),
  CONSTRAINT `branch_ibfk_2` FOREIGN KEY (`branchsclientid`) REFERENCES `client` (`clientid`),
  CONSTRAINT `branch_ibfk_1` FOREIGN KEY (`managerid`) REFERENCES `employee` (`employeeid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
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
  KEY `addressid` (`addressid`),
  CONSTRAINT `client_ibfk_1` FOREIGN KEY (`addressid`) REFERENCES `address` (`addressid`)
) ENGINE=InnoDB AUTO_INCREMENT=54010023 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `client`
--

LOCK TABLES `client` WRITE;
/*!40000 ALTER TABLE `client` DISABLE KEYS */;
INSERT INTO `client` VALUES (54010001,'NULL','Downtown Mtl','Branch 10001',10000001,'1990-01-01','1990-01-01',1),(54010002,'NULL','Montreal W.I.','Branch 10002',10000002,'1992-01-01','1992-01-01',1),(54010003,'NULL','Downtown T.O','Branch 10003',10000003,'1994-01-01','1994-01-01',1),(54010004,'NULL','Quebec  QC','Branch 10004',10000004,'1995-01-01','1995-01-01',1),(54010005,'214 586 216','Carla','Suarez',10000005,'1964-12-30','1990-11-05',1),(54010006,'218 741 532','Daniela','Hantuchova',10000006,'1972-11-08','2001-12-01',1),(54010007,'241 257 845','Flavia','Pennetta',10000007,'1959-02-14','2000-04-08',1),(54010008,'221 963 548','Arantxa','Parra',10000008,'1969-09-04','2003-10-24',1),(54010009,'254 284 541','Alisa','Kleybanova',10000009,'1982-02-21','2007-05-21',1),(54010010,'241 653 523','Kateryna','Bondarenko',10000010,'1979-02-11','1999-10-18',1),(54010011,'287 243 097','Caroline','Wozniacki',10000013,'1988-06-28','2003-09-07',1),(54010012,'298 835 908','Yanina','Wickmayer',10000016,'1990-08-03','2008-11-04',0),(54010013,'187 674 323','Mountainlake','University',10000041,'1954-05-11','1990-01-24',1),(54010014,'129 340 002','Highhill','Hospital',10000042,'1919-01-02','1991-02-17',1),(54010015,'265 336 987','Chantal','Wordsworth',10000043,'1945-07-05','1999-09-09',0),(54010016,'213 654 147','Oscar','Wilde',10000044,'1984-12-23','1998-03-20',1),(54010017,'284 149 589','Chander','Sai',10000045,'1977-04-28','2002-08-31',1),(54010018,'216 563 672','Web Weaver','Consultancy',10000046,'1999-08-05','1999-08-05',1),(54010019,'129 342 100','Adminstration',' Highhill Hospital',10000047,'1919-01-02','1991-02-17',1),(54010020,'229 058 741','Paulette','Bourgeois',10000048,'1970-02-16','2005-07-13',1),(54010021,'287 674 390','Human Resourses',' Mountainlake Univ.',10000049,'1954-05-11','1990-01-24',1),(54010022,'148 587 377','Edison','Albert',10000050,'1945-11-07','1999-08-14',1);
/*!40000 ALTER TABLE `client` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clientaccount`
--

DROP TABLE IF EXISTS `clientaccount`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clientaccount` (
  `clientaccountid` int(8) unsigned NOT NULL,
  `branchid` int(5) unsigned NOT NULL,
  `clientid` int(8) unsigned NOT NULL,
  `accounttypeid` int(2) unsigned NOT NULL,
  `currentbalance` decimal(10,2) NOT NULL DEFAULT '0.00',
  `availablebalance` decimal(10,2) NOT NULL DEFAULT '0.00',
  `status` int(1) NOT NULL,
  `openingdate` date NOT NULL,
  `closingdate` date DEFAULT NULL,
  PRIMARY KEY (`branchid`,`clientaccountid`),
  KEY `accounttypeid` (`accounttypeid`),
  KEY `clientid` (`clientid`),
  CONSTRAINT `clientaccount_ibfk_1` FOREIGN KEY (`accounttypeid`) REFERENCES `accounttype` (`accounttypeid`),
  CONSTRAINT `clientaccount_ibfk_3` FOREIGN KEY (`clientid`) REFERENCES `client` (`clientid`),
  CONSTRAINT `clientaccount_ibfk_4` FOREIGN KEY (`branchid`) REFERENCES `branch` (`branchid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientaccount`
--

LOCK TABLES `clientaccount` WRITE;
/*!40000 ALTER TABLE `clientaccount` DISABLE KEYS */;
INSERT INTO `clientaccount` VALUES (10000001,10001,54010001,2,'3500.00','3500.00',1,'2010-07-01',NULL),(10000002,10001,54010015,1,'700.00','1700.00',1,'2010-06-01',NULL),(10000003,10001,54010001,2,'4000.00','4000.00',1,'2010-01-01',NULL),(20000002,10001,54010002,2,'6500.00','6500.00',1,'2010-06-01',NULL),(110001001,10001,54010005,1,'4205.65','5205.65',1,'1990-11-05',NULL),(110001002,10001,54010009,1,'4800.30','5800.30',1,'2007-05-21',NULL),(110001003,10001,54010011,1,'2125.50','3125.50',1,'2003-09-07',NULL),(110001012,10001,54010015,1,'0.00','0.00',0,'1999-09-09','2007-05-01'),(110001019,10001,54010016,2,'14900.00','14900.00',1,'1998-03-20',NULL),(110001022,10001,54010015,2,'4500.00','4500.00',1,'2007-05-01',NULL),(110001039,10001,54010022,1,'3290.85','4290.85',1,'1999-08-14',NULL),(110001090,10001,54010020,1,'5690.00','6690.00',1,'2005-07-13',NULL),(110001102,10001,54010017,2,'12000.00','12000.00',1,'2002-08-31',NULL),(210001004,10001,54010013,11,'76239.05','76239.05',1,'1990-01-24',NULL),(210001005,10001,54010014,11,'34765.35','34765.35',1,'1991-02-17',NULL),(210001006,10001,54010019,10,'12980.99','12980.99',1,'1991-02-17',NULL),(210001007,10001,54010021,10,'18540.45','18540.45',1,'1990-01-24',NULL),(210001014,10001,54010018,11,'45000.00','45000.00',1,'1999-08-05',NULL),(110002001,10002,54010006,1,'6456.13','7456.13',1,'2001-12-01',NULL),(110002002,10002,54010010,1,'2750.00','3750.00',1,'1999-10-18',NULL),(210002001,10002,54010002,10,'86543.98','86543.98',1,'1992-01-01',NULL),(110003001,10003,54010007,1,'2100.00','3100.00',1,'2000-04-08',NULL),(210003001,10003,54010003,10,'75089.07','75089.07',1,'1994-01-01',NULL),(110004001,10004,54010008,1,'5089.67','6089.67',1,'2003-10-24',NULL),(110004002,10004,54010012,1,'0.00','0.00',0,'2008-11-04','2010-07-28'),(110004523,10004,54010008,7,'20000.00','20000.00',1,'2010-07-20',NULL),(210004001,10004,54010004,10,'26403.68','26403.68',1,'1995-01-01',NULL);
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
  KEY `addressid` (`addressid`),
  KEY `branchid` (`branchid`),
  KEY `titleid` (`titleid`),
  KEY `timeoffid` (`timeoffid`),
  CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`addressid`) REFERENCES `address` (`addressid`),
  CONSTRAINT `employee_ibfk_2` FOREIGN KEY (`branchid`) REFERENCES `branch` (`branchid`),
  CONSTRAINT `employee_ibfk_3` FOREIGN KEY (`titleid`) REFERENCES `employeetitle` (`titleid`)
) ENGINE=InnoDB AUTO_INCREMENT=20000037 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employee`
--

LOCK TABLES `employee` WRITE;
/*!40000 ALTER TABLE `employee` DISABLE KEYS */;
INSERT INTO `employee` VALUES (20000001,10000005,10001,10,32043,'Carla','Suarez',10002,1),(20000002,10000006,10002,10,110000,'Daniela','Hantuchova',10002,1),(20000003,10000007,10003,10,110000,'Flavia','Pennetta',10002,1),(20000004,10000008,10004,10,100000,'Arantxa','Parra',10003,1),(20000005,10000009,10001,20,33000,'Alisa','Kleybanova',10003,1),(20000006,10000010,10002,20,40000,'Kateryna','Bondarenko',10001,1),(20000007,10000011,10003,15,70000,'Jie','Zheng',10001,1),(20000008,10000012,10004,15,75000,'Francesca','Schiavone',10001,1),(20000009,10000013,10001,20,55000,'Caroline','Wozniacki',10004,1),(20000010,10000014,10002,20,58000,'Dominika','Cibulkova',10001,1),(20000011,10000015,10003,20,60000,'Sybille','Bammer',10001,1),(20000012,10000016,10004,20,65000,'Yanina','Wickmayer',10001,1),(20000013,10000017,10001,30,30000,'Olga','Govortsova',10001,1),(20000014,10000018,10001,15,60000,'Jo-Wilfried','Tsonga',10001,1),(20000015,10000019,10001,30,35000,'John','Isner',10001,1),(20000016,10000020,10001,30,30000,'Ernests','Gulbis',10001,1),(20000017,10000021,10001,20,45000,'Albert','Montanes',10001,1),(20000018,10000022,10001,30,35000,'Tommy','Robredo',10001,1),(20000019,10000023,10002,30,30000,'Sam','Querrey',10001,1),(20000020,10000024,10002,30,32000,'Eduardo','Schwank',10001,1),(20000021,10000025,10002,30,35000,'Brian','Blanchette',10001,1),(20000022,10000026,10002,30,30000,'Patsy','Keays',10001,1),(20000023,10000027,10002,30,32000,'Philipp','Petzschner',10001,1),(20000024,10000028,10002,30,35000,'Richard','Gasquet',10001,1),(20000025,10000029,10003,30,30000,'Gael','Monfils',10004,1),(20000026,10000030,10003,30,32000,'Ivan','Ljubicic',10004,1),(20000027,10000031,10003,30,35000,'Sabine','Lisicki',10004,1),(20000028,10000032,10003,30,30000,'Maria','Sharapova',10001,1),(20000029,10000033,10003,30,32000,'Venus','Williams',10001,1),(20000030,10000034,10002,30,35000,'Marcos','Baghdatis',10001,1),(20000031,10000035,10004,30,30000,'Feliciano','Lopez',15,1),(20000032,10000036,10004,30,32000,'Mikhail','Youzhny',10,1),(20000033,10000037,10004,30,35000,'Fernando','Verdasco',15,1),(20000034,10000038,10004,30,30000,'Guillermo','Garcia-Lopez',15,1),(20000035,10000039,10004,30,32000,'Rafael','Nadal',15,1),(20000036,10000040,10004,30,35000,'Andy','Roddick',10,1);
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
  PRIMARY KEY (`employeeid`),
  CONSTRAINT `employeetimeoffhistory_ibfk_1` FOREIGN KEY (`employeeid`) REFERENCES `employee` (`timeoffid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employeetimeoffhistory`
--

LOCK TABLES `employeetimeoffhistory` WRITE;
/*!40000 ALTER TABLE `employeetimeoffhistory` DISABLE KEYS */;
/*!40000 ALTER TABLE `employeetimeoffhistory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employeetimeoffplan`
--

DROP TABLE IF EXISTS `employeetimeoffplan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employeetimeoffplan` (
  `timeoffid` int(5) unsigned NOT NULL,
  `timeoffname` varchar(30) NOT NULL,
  `numberofdays` int(2) NOT NULL,
  PRIMARY KEY (`timeoffid`),
  CONSTRAINT `employeetimeoffplan_ibfk_1` FOREIGN KEY (`timeoffid`) REFERENCES `employee` (`timeoffid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employeetimeoffplan`
--

LOCK TABLES `employeetimeoffplan` WRITE;
/*!40000 ALTER TABLE `employeetimeoffplan` DISABLE KEYS */;
INSERT INTO `employeetimeoffplan` VALUES (10001,'regular plan',20),(10002,'branch manager plan',25),(10003,'senior plan',30),(10004,'probation plan',10);
/*!40000 ALTER TABLE `employeetimeoffplan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employeetitle`
--

DROP TABLE IF EXISTS `employeetitle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employeetitle` (
  `titleid` int(2) unsigned NOT NULL,
  `titlename` varchar(25) NOT NULL,
  `basesalary` decimal(8,2) NOT NULL,
  PRIMARY KEY (`titleid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employeetitle`
--

LOCK TABLES `employeetitle` WRITE;
/*!40000 ALTER TABLE `employeetitle` DISABLE KEYS */;
INSERT INTO `employeetitle` VALUES (10,'Branch Manager','100000.00'),(15,'Assistant Manager','70000.00'),(20,'Banking Consultant','55000.00'),(30,'Teller','30000.00');
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
INSERT INTO `employeeworkhistory` VALUES (20000001,10001,'2010-08-05','0000-00-00',10,'32043.00'),(20000001,10001,'2010-08-05','2010-08-05',15,'2000.00'),(20000005,10001,'2007-01-01','2010-08-05',30,'28000.00'),(20000005,10001,'2010-08-05','0000-00-00',20,'33000.00'),(20000014,10001,'2008-01-01','2008-12-31',30,'30000.00'),(20000014,10001,'2009-01-01','2010-08-05',20,'40000.00'),(20000014,10001,'2010-08-05','0000-00-00',15,'60000.00'),(20000017,10001,'2009-01-01','2009-05-31',30,'25000.00'),(20000017,10001,'2009-06-01','2009-12-31',30,'30000.00'),(20000017,10001,'2010-01-01','0000-00-00',20,'45000.00'),(20000006,10002,'2010-01-01','2010-08-05',30,'20000.00'),(20000006,10002,'2010-08-05','0000-00-00',20,'40000.00'),(20000007,10003,'2010-01-01','2010-08-05',15,'60000.00'),(20000007,10003,'2010-08-05','0000-00-00',15,'70000.00');
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
-- Table structure for table `postalcodes`
--

DROP TABLE IF EXISTS `postalcodes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `postalcodes` (
  `postalcodes` varchar(7) NOT NULL,
  `city` varchar(15) NOT NULL,
  `province` varchar(15) NOT NULL,
  PRIMARY KEY (`postalcodes`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `postalcodes`
--

LOCK TABLES `postalcodes` WRITE;
/*!40000 ALTER TABLE `postalcodes` DISABLE KEYS */;
INSERT INTO `postalcodes` VALUES ('G1E-1A1','Quebec','Quebec'),('G1E-2E5','Quebec','Quebec'),('G1E-5A4','Quebec','Quebec'),('G4D-8I2','Quebec','Quebec'),('G4R-1Z7','Quebec','Quebec'),('G8H-1E2','Quebec','Quebec'),('G8H-2A6','Ste-Foy','Quebec'),('G8H-2E5','Ste-Foy','Quebec'),('G8H-7T3','Ste-Foy','Quebec'),('H0H-8J2','Montreal','Quebec'),('H0J-4C8','Lachine','Quebec'),('H1A-5F9','Montreal','Quebec'),('H1K-5D9','Westmount','Quebec'),('H1T-1A1','Beaconsfield','Quebec'),('H2B-6G0','Lachine','Quebec'),('H2L-6E0','Montreal','Quebec'),('H3A-7F5','Westmount','Quebec'),('H3D-4E3','Westmount','Quebec'),('H3G-1A4','Montreal','Quebec'),('H3G-1E8','Westmount','Quebec'),('H3G-1M8','Montreal','Quebec'),('H3G-1R7','Westmount','Quebec'),('H3H-2S4','Montreal','Quebec'),('H3K-1Z2','Montreal','Quebec'),('H3X-1F3','Hampstead','Quebec'),('H4B-8G6','St-Hubert','Quebec'),('H4J-5R5','Montreal','Quebec'),('H5C-9H7','Lachine','Quebec'),('H5E-9J3','Montreal','Quebec'),('H6D-0F8','Laval','Quebec'),('H6F-0K4','Westmount','Quebec'),('H7E-5G9','Montreal','Quebec'),('H8F-6H0','Lachine','Quebec'),('H9G-7I1','Westmount','Quebec'),('H9I-3B7','Montreal','Quebec'),('J0H-8J2','Toronto','Ontario'),('J3C-7H1','Toronto','Ontario'),('J5C-9H7','Toronto','Ontario'),('J6D-0F8','Toronto','Ontario'),('J7E-5G9','Toronto','Ontario'),('J7G-1L5','Toronto','Ontario'),('J7Y-1R1','Toronto','Ontario'),('J8F-6H0','Toronto','Ontario'),('J9G-7I1','Toronto','Ontario');
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
  `servicecategoryid` int(2) unsigned NOT NULL,
  `servicecategoryname` varchar(10) NOT NULL,
  UNIQUE KEY `servicecategoryid` (`servicecategoryid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
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
  `servicetypeid` int(2) unsigned NOT NULL,
  `serviceid` int(2) unsigned NOT NULL,
  `servicetypename` varchar(25) NOT NULL,
  UNIQUE KEY `servicetypeid` (`servicetypeid`),
  KEY `serviceid` (`serviceid`),
  CONSTRAINT `servicetype_ibfk_1` FOREIGN KEY (`serviceid`) REFERENCES `service` (`serviceid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servicetype`
--

LOCK TABLES `servicetype` WRITE;
/*!40000 ALTER TABLE `servicetype` DISABLE KEYS */;
INSERT INTO `servicetype` VALUES (1,1,'Chequing'),(2,1,'Savings'),(3,1,'Foreign Currency'),(4,4,'Credit Cards'),(5,4,'Line Of Credit'),(6,2,'RSP'),(7,2,'TFSA'),(8,3,'Life');
/*!40000 ALTER TABLE `servicetype` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transaction`
--

DROP TABLE IF EXISTS `transaction`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transaction` (
  `transactionid` int(8) unsigned NOT NULL,
  `branchid` int(5) unsigned NOT NULL,
  `accountid` int(8) unsigned NOT NULL,
  `date` date NOT NULL,
  `transactionfeecharged` decimal(2,2) DEFAULT NULL,
  `transactionfeetype` varchar(25) NOT NULL,
  `depositamount` decimal(10,2) DEFAULT NULL,
  `withdrawalamount` decimal(8,2) DEFAULT NULL,
  `transactiondescription` varchar(50) NOT NULL,
  PRIMARY KEY (`transactionid`),
  KEY `transaction_ibfk_1` (`branchid`,`accountid`),
  CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`branchid`, `accountid`) REFERENCES `clientaccount` (`branchid`, `clientaccountid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transaction`
--

LOCK TABLES `transaction` WRITE;
/*!40000 ALTER TABLE `transaction` DISABLE KEYS */;
INSERT INTO `transaction` VALUES (27,10001,110001012,'2007-05-01','0.00','Free transaction',NULL,'4500.00','Account transfer; Closed account '),(28,10001,110001022,'2007-05-01','0.00','Free transaction','4500.00',NULL,'Opened account tranferring money'),(231,10004,110004002,'2010-07-28','0.00','Free transaction',NULL,'1454.56','On ATM; Closed account '),(476,10001,210001014,'2010-07-30','0.99','Service charges','33000.00','0.00','Check deposit on Mtl branch'),(531,10001,110001039,'2010-07-28','0.00','Free transaction',NULL,'124.00','Bill payment on ATM; To HydroQuebec'),(543,10001,110001090,'2010-07-25','0.00','Free transaction',NULL,'79.00','Bill payment online; To HydroQuebec'),(558,10001,110001019,'2010-08-01','0.00','Free transaction',NULL,'1329.00','Bill payment by telephone; To Mountainlake Univ.'),(559,10001,210001004,'2010-08-02','0.00','Free transaction','1329.00',NULL,'Received payment by telephone; From Oscar Wilde'),(91100001,10001,10000001,'2010-07-01','0.00','free transaction','5000.00',NULL,'my first deposit on saving account'),(91100002,10001,10000001,'2010-07-05','0.00','free transaction',NULL,'1000.00','withdraw money for trip'),(91100003,10001,10000001,'2010-07-10','0.00','free transaction',NULL,'1000.00','withdraw money for trip'),(91100004,10001,10000001,'2010-07-15','0.00','free transaction','500.00',NULL,'deposit money left from trip'),(91200001,10001,10000002,'2010-06-01','0.00','free transaction','1000.00',NULL,'my first deposit on checking account'),(91200002,10001,10000002,'2010-06-02','0.00','free transaction',NULL,'100.00','bill payment'),(91200003,10001,10000002,'2010-06-03','0.00','free transaction',NULL,'200.00','bill payment'),(91200004,10001,10000002,'2010-06-10','0.00','free transaction',NULL,'500.00','bill payment'),(91200005,10001,10000002,'2010-06-15','0.00','free transaction','500.00',NULL,'my second deposit on checking account'),(91300001,10001,10000003,'2010-01-01','0.00','free transaction','4000.00',NULL,'deposit money for future studing');
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

-- Dump completed on 2010-08-06 23:03:01
