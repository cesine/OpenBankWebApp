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
  PRIMARY KEY (`accounttypeid`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accounttype`
--

LOCK TABLES `accounttype` WRITE;
/*!40000 ALTER TABLE `accounttype` DISABLE KEYS */;
INSERT INTO `accounttype` VALUES (1,1,1,'Powerchequing Account'),(2,1,2,'Money Master Savings Account'),(3,1,3,'US Dollar Account'),(4,1,4,'No-Fee Value VISA'),(5,1,5,'No-fee Value VISA'),(6,1,6,'GIC(6mos) with Flex for RSPs Account'),(7,1,7,'GIC with Flex for TFSAs Account'),(8,1,9,'Accidental Death Insurance '),(10,2,1,'Basic Business Chequing Account'),(11,2,2,'Basic Business Savings Account'),(12,2,3,'Basic Business Foreign Currency Account'),(13,1,6,'GIC(12mos) with Flex for RSPs Account'),(14,1,6,'GIC(18mos) with Flex for RSPs Account');
/*!40000 ALTER TABLE `accounttype` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `address`
--

DROP TABLE IF EXISTS `address`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `address` (
  `addressid` int(8) NOT NULL,
  `streetname` varchar(25) NOT NULL,
  `streetnumber` int(6) NOT NULL,
  `city` varchar(15) NOT NULL,
  `province` varchar(15) NOT NULL,
  `postalcode` varchar(7) NOT NULL,
  PRIMARY KEY (`addressid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `address`
--

LOCK TABLES `address` WRITE;
/*!40000 ALTER TABLE `address` DISABLE KEYS */;
INSERT INTO `address` VALUES (10000001,'Ste-Catherine',1200,'Montreal','Quebec','H3K-1Z2'),(10000002,'Hymus Ave.',98,'Beaconsfield','Quebec','H1T-1A1'),(10000003,'Front Street',1234,'Toronto','Ontario','J7Y-1R1'),(10000004,'Rue Paradis',1195,'Quebec','Quebec','G4R-1Z7'),(10000005,'1st Street',7632,'Montreal','Quebec','H1A-5F9'),(10000006,'2nd Street',8380,'Lachine','Quebec','H2B-6G0'),(10000007,'3rd Avenue',9768,'Toronto','Ontario','J3C-7H1'),(10000008,'Joliette Street',5822,'Quebec','Quebec','G4D-8I2'),(10000009,'Arnaud Avenue',89,'Montreal','Quebec','H5E-9J3'),(10000010,'Smith Street',3025,'Westmount','Quebec','H6F-0K4'),(10000011,'Laure Avenue',8089,'Toronto','Ontario','J7G-1L5'),(10000012,'Lafayette Avenue',1736,'Ste-Foy','Quebec','G8H-2A6'),(10000013,'Brochu Street',7734,'Montreal','Quebec','H9I-3B7'),(10000014,'McRae Street',6702,'Lachine','Quebec','H0J-4C8'),(10000015,'Arsenault Avenue',5654,'Westmount','Quebec','H1K-5D9'),(10000016,'2nd Street',3092,'St-Hubert','Quebec','H2L-6E0'),(10000017,'3rd Avenue',3957,'Laval','Quebec','H3A-7F5'),(10000018,'Laure Avenue',6643,'Montreal','Quebec','H4B-8G6'),(10000019,'Arnaud Avenue',9923,'Lachine','Quebec','H5C-9H7'),(10000020,'Joliette Street',2763,'Laval','Quebec','H6D-0F8'),(10000021,'Lafayette Avenue',2357,'Montreal','Quebec','H7E-5G9'),(10000022,'McRae Street',3551,'Lachine','Quebec','H8F-6H0'),(10000023,'Arsenault Avenue',797,'Westmount','Quebec','H9G-7I1'),(10000024,'Arnaud Street',5591,'Montreal','Quebec','H0H-8J2'),(10000025,'Arsenault Avenue',3456,'Westmount','Quebec','H1K-5D9'),(10000026,'3rd Avenue',47,'Montreal','Quebec','H2L-6E0'),(10000027,'Brochu Avenue',2363,'Westmount','Quebec','H3A-7F5'),(10000028,'Laure Street',824,'St-Hubert','Quebec','H4B-8G6'),(10000029,'Joliette Avenue',4158,'Toronto','Ontario','J5C-9H7'),(10000030,'Lafayette Avenue',1861,'Toronto','Ontario','J6D-0F8'),(10000031,'McRae Street',9600,'Toronto','Ontario','J7E-5G9'),(10000032,'Arsenault Avenue',1715,'Toronto','Ontario','J8F-6H0'),(10000033,'2nd Street',8684,'Toronto','Ontario','J9G-7I1'),(10000034,'McRae Street',47,'Toronto','Ontario','J0H-8J2'),(10000035,'Rue Paradis',453,'Quebec','Quebec','G1E-5A4'),(10000036,'Rue Paradis',345,'Quebec','Quebec','G1E-2E5'),(10000037,'Lafayette Avenue',674,'Ste-Foy','Quebec','G8H-2E5'),(10000038,'Joliette Street',2345,'Quebec','Quebec','G1E-1A1'),(10000039,'Lafayette Avenue',6756,'Ste-Foy','Quebec','G8H-7T3'),(10000040,'Joliette Street',34,'Quebec','Quebec','G8H-1E2');
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
  `monthlyfee` double NOT NULL,
  `freetransactions` int(3) unsigned NOT NULL,
  `transactionfee` double NOT NULL,
  `overdraftamount` double NOT NULL,
  `overdraftprotectionfee` double NOT NULL,
  `minimumbalance` decimal(10,0) NOT NULL,
  `interestrate` int(11) NOT NULL,
  UNIQUE KEY `accounttypeid` (`accounttypeid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bankingplans`
--

LOCK TABLES `bankingplans` WRITE;
/*!40000 ALTER TABLE `bankingplans` DISABLE KEYS */;
INSERT INTO `bankingplans` VALUES (1,4,20,0.65,1000,5,'0',0),(3,25,10,1,0,0,'0',0);
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
  `creditlimit` double NOT NULL,
  `monthlyfee` double NOT NULL,
  `graceperiod` int(2) unsigned NOT NULL,
  `interestrate` double NOT NULL,
  UNIQUE KEY `accounttypeid` (`accounttypeid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `borrowingplans`
--

LOCK TABLES `borrowingplans` WRITE;
/*!40000 ALTER TABLE `borrowingplans` DISABLE KEYS */;
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
  `branchname` varchar(12) NOT NULL,
  `addressid` int(8) unsigned NOT NULL,
  `managerid` int(8) unsigned NOT NULL,
  `openingdate` date NOT NULL,
  `openinghours` tinytext NOT NULL,
  `branchsclientid` int(8) unsigned NOT NULL,
  `status` int(1) unsigned NOT NULL,
  PRIMARY KEY (`branchid`),
  KEY `addressid` (`addressid`),
  KEY `managerid` (`managerid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `branch`
--

LOCK TABLES `branch` WRITE;
/*!40000 ALTER TABLE `branch` DISABLE KEYS */;
INSERT INTO `branch` VALUES (10001,'Downtown Mtl',10000001,2147483647,'1990-01-01','Mon-Fri 10:00-17:00',0,0),(10002,'Montreal W.I',10000002,2147483647,'1992-01-01','Mon-Fri 10:00-17:00',0,0),(10003,'Downtown T.O',10000003,2147483647,'1994-01-01','Mon-Fri 10:00-17:00',0,0),(10004,'Quebec QC',10000004,2147483647,'1995-01-01','Mon-Fri 10:00-17:00',0,0);
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
  `ssn` varchar(11) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `addressid` int(8) NOT NULL,
  `dateofbirth` date NOT NULL,
  `startdate` date NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`clientid`),
  KEY `addressid` (`addressid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `client`
--

LOCK TABLES `client` WRITE;
/*!40000 ALTER TABLE `client` DISABLE KEYS */;
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
  `currentbalance` double NOT NULL,
  `availablebalance` double NOT NULL,
  `status` int(1) NOT NULL,
  `openingdate` date NOT NULL,
  `closingdate` date DEFAULT NULL,
  UNIQUE KEY `clientaccountid` (`clientaccountid`),
  KEY `branchid` (`branchid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientaccount`
--

LOCK TABLES `clientaccount` WRITE;
/*!40000 ALTER TABLE `clientaccount` DISABLE KEYS */;
/*!40000 ALTER TABLE `clientaccount` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clientlogin`
--

DROP TABLE IF EXISTS `clientlogin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clientlogin` (
  `clientid` int(8) NOT NULL,
  `passwd` varchar(20) NOT NULL,
  UNIQUE KEY `clientid` (`clientid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientlogin`
--

LOCK TABLES `clientlogin` WRITE;
/*!40000 ALTER TABLE `clientlogin` DISABLE KEYS */;
/*!40000 ALTER TABLE `clientlogin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employee` (
  `employeeid` int(8) unsigned NOT NULL,
  `addressid` int(8) unsigned NOT NULL,
  `branchid` int(5) unsigned NOT NULL,
  `titleid` int(2) unsigned NOT NULL,
  `salary` double NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `vacationdaysallowed` int(2) unsigned DEFAULT NULL,
  `status` int(1) unsigned NOT NULL,
  PRIMARY KEY (`employeeid`),
  KEY `addressid` (`addressid`),
  KEY `branchid` (`branchid`),
  KEY `titleid` (`titleid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employee`
--

LOCK TABLES `employee` WRITE;
/*!40000 ALTER TABLE `employee` DISABLE KEYS */;
INSERT INTO `employee` VALUES (20000001,10000005,10001,10,120000,'Carla','Suarez',20,1),(20000002,10000006,10002,10,110000,'Daniela','Hantuchova',20,1),(20000003,10000007,10003,10,110000,'Flavia','Pennetta',20,1),(20000004,10000008,10004,10,100000,'Arantxa','Parra',20,1),(20000005,10000009,10001,15,80000,'Alisa','Kleybanova',20,1),(20000006,10000010,10002,15,75000,'Kateryna','Bondarenko',20,1),(20000007,10000011,10003,15,70000,'Jie','Zheng',20,1),(20000008,10000012,10004,15,75000,'Francesca','Schiavone',20,1),(20000009,10000013,10001,20,55000,'Caroline','Wozniacki',15,1),(20000010,10000014,10002,20,58000,'Dominika','Cibulkova',20,1),(20000011,10000015,10003,20,60000,'Sybille','Bammer',15,1),(20000012,10000016,10004,20,65000,'Yanina','Wickmayer',20,1),(20000013,10000017,10001,30,30000,'Olga','Govortsova',15,1),(20000014,10000018,10001,30,32000,'Jo-Wilfried','Tsonga',10,1),(20000015,10000019,10001,30,35000,'John','Isner',15,1),(20000016,10000020,10001,30,30000,'Ernests','Gulbis',15,1),(20000017,10000021,10001,30,32000,'Albert','Montanes',15,1),(20000018,10000022,10001,30,35000,'Tommy','Robredo',10,1),(20000019,10000023,10002,30,30000,'Sam','Querrey',15,1),(20000020,10000024,10002,30,32000,'Eduardo','Schwank',10,1),(20000021,10000025,10002,30,35000,'Brian','Blanchette',15,1),(20000022,10000026,10002,30,30000,'Patsy','Keays',15,1),(20000023,10000027,10002,30,32000,'Philipp','Petzschner',15,1),(20000024,10000028,10002,30,35000,'Richard','Gasquet',10,1),(20000025,10000029,10003,30,30000,'Gael','Monfils',15,1),(20000026,10000030,10003,30,32000,'Ivan','Ljubicic',10,1),(20000027,10000031,10003,30,35000,'Sabine','Lisicki',15,1),(20000028,10000032,10003,30,30000,'Maria','Sharapova',15,1),(20000029,10000033,10003,30,32000,'Venus','Williams',15,1),(20000030,10000034,10003,30,35000,'Marcos','Baghdatis',10,1),(20000031,10000035,10004,30,30000,'Feliciano','Lopez',15,1),(20000032,10000036,10004,30,32000,'Mikhail','Youzhny',10,1),(20000033,10000037,10004,30,35000,'Fernando','Verdasco',15,1),(20000034,10000038,10004,30,30000,'Guillermo','Garcia-Lopez',15,1),(20000035,10000039,10004,30,32000,'Rafael','Nadal',15,1),(20000036,10000040,10004,30,35000,'Andy','Roddick',10,1);
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
  UNIQUE KEY `employeeid` (`employeeid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employeelogin`
--

LOCK TABLES `employeelogin` WRITE;
/*!40000 ALTER TABLE `employeelogin` DISABLE KEYS */;
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
  PRIMARY KEY (`employeeid`)
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
-- Table structure for table `employeetitle`
--

DROP TABLE IF EXISTS `employeetitle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employeetitle` (
  `titleid` int(2) NOT NULL,
  `titlename` varchar(25) NOT NULL,
  `basesalary` double NOT NULL,
  PRIMARY KEY (`titleid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employeetitle`
--

LOCK TABLES `employeetitle` WRITE;
/*!40000 ALTER TABLE `employeetitle` DISABLE KEYS */;
INSERT INTO `employeetitle` VALUES (10,'Branch Manager',100000),(15,'Assistant Manager',70000),(20,'Banking Consultant',55000),(30,'Teller',30000);
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
  `salary` double NOT NULL,
  PRIMARY KEY (`employeeid`,`branchid`,`startdate`,`lastdate`,`titleid`,`salary`),
  KEY `branchid` (`branchid`),
  KEY `titleid` (`titleid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employeeworkhistory`
--

LOCK TABLES `employeeworkhistory` WRITE;
/*!40000 ALTER TABLE `employeeworkhistory` DISABLE KEYS */;
/*!40000 ALTER TABLE `employeeworkhistory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `insuranceplan`
--

DROP TABLE IF EXISTS `insuranceplan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `insuranceplan` (
  `accounttypeid` int(2) unsigned NOT NULL,
  `coverage` double NOT NULL,
  `monthlypremium` double NOT NULL,
  UNIQUE KEY `accounttypeid` (`accounttypeid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `insuranceplan`
--

LOCK TABLES `insuranceplan` WRITE;
/*!40000 ALTER TABLE `insuranceplan` DISABLE KEYS */;
/*!40000 ALTER TABLE `insuranceplan` ENABLE KEYS */;
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
  `interestrate` double NOT NULL,
  UNIQUE KEY `accounttypeid` (`accounttypeid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `investmentplans`
--

LOCK TABLES `investmentplans` WRITE;
/*!40000 ALTER TABLE `investmentplans` DISABLE KEYS */;
INSERT INTO `investmentplans` VALUES (6,6,1),(13,12,1.75),(14,18,2);
/*!40000 ALTER TABLE `investmentplans` ENABLE KEYS */;
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
  UNIQUE KEY `servicetypeid` (`servicetypeid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servicetype`
--

LOCK TABLES `servicetype` WRITE;
/*!40000 ALTER TABLE `servicetype` DISABLE KEYS */;
INSERT INTO `servicetype` VALUES (1,1,'Chequing'),(2,1,'Savings'),(3,1,'Foreign Currency'),(4,4,'Credit Cards'),(5,4,'Line Of Credit'),(6,2,'RSP'),(7,2,'TFSA'),(9,3,'Life');
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
  `clientid` int(8) unsigned NOT NULL,
  `accountid` int(8) unsigned NOT NULL,
  `date` date NOT NULL,
  `transactionfeecharged` double DEFAULT NULL,
  `transactionfeetype` varchar(25) NOT NULL,
  `depositamount` double DEFAULT NULL,
  `withdrawalamount` double DEFAULT NULL,
  `balance` double NOT NULL,
  `transactiondescription` varchar(50) NOT NULL,
  PRIMARY KEY (`transactionid`),
  KEY `accountid` (`accountid`),
  KEY `clientid` (`clientid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transaction`
--

LOCK TABLES `transaction` WRITE;
/*!40000 ALTER TABLE `transaction` DISABLE KEYS */;
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

-- Dump completed on 2010-07-30 17:03:01
