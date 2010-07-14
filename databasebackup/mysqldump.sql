-- phpMyAdmin SQL Dump
-- version 3.2.2.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 13, 2010 at 11:15 PM
-- Server version: 5.1.37
-- PHP Version: 5.2.10-2ubuntu6.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Database: `bankapp`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

DROP TABLE IF EXISTS `account`;
CREATE TABLE IF NOT EXISTS `account` (
  `accountid` int(11) NOT NULL AUTO_INCREMENT,
  `accounttypeid` int(11) NOT NULL,
  `accountnickname` int(11) NOT NULL,
  `clientid` int(11) NOT NULL,
  `balance` int(11) NOT NULL,
  PRIMARY KEY (`accountid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `account`
--


-- --------------------------------------------------------

--
-- Table structure for table `accounttype`
--

DROP TABLE IF EXISTS `accounttype`;
CREATE TABLE IF NOT EXISTS `accounttype` (
  `accounttypeid` int(11) NOT NULL,
  `preferencelevelid` int(11) NOT NULL,
  `interesttypeid` int(11) NOT NULL,
  `negativelimit` decimal(10,0) NOT NULL,
  `positivelimit` decimal(10,0) NOT NULL,
  `monthlyfee` decimal(10,0) NOT NULL,
  UNIQUE KEY `accounttypeid` (`accounttypeid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `accounttype`
--


-- --------------------------------------------------------

--
-- Table structure for table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `clientid` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(25) NOT NULL,
  `lastname` varchar(25) NOT NULL,
  `addressid` int(11) NOT NULL,
  `dateofbirth` date NOT NULL,
  `startdate` date NOT NULL,
  PRIMARY KEY (`clientid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `client`
--


-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE IF NOT EXISTS `employee` (
  `employeeid` int(11) NOT NULL,
  `addressid` int(11) NOT NULL,
  `branchid` int(11) NOT NULL,
  `username` varchar(15) NOT NULL,
  `titleid` int(11) NOT NULL,
  PRIMARY KEY (`employeeid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employee`
--


-- --------------------------------------------------------

--
-- Table structure for table `guaranteedinvestmentcertificate`
--

DROP TABLE IF EXISTS `guaranteedinvestmentcertificate`;
CREATE TABLE IF NOT EXISTS `guaranteedinvestmentcertificate` (
  `guaranteedinvestmentcertificatesid` int(11) NOT NULL AUTO_INCREMENT,
  `termlength` double NOT NULL,
  `rate` double NOT NULL,
  PRIMARY KEY (`guaranteedinvestmentcertificatesid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `guaranteedinvestmentcertificate`
--


-- --------------------------------------------------------

--
-- Table structure for table `preferencelevelid`
--

DROP TABLE IF EXISTS `preferencelevelid`;
CREATE TABLE IF NOT EXISTS `preferencelevelid` (
  `clientlevelid` int(11) NOT NULL AUTO_INCREMENT,
  `clientlevelname` varchar(25) NOT NULL,
  PRIMARY KEY (`clientlevelid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `preferencelevelid`
--

INSERT INTO `preferencelevelid` (`clientlevelid`, `clientlevelname`) VALUES
(1, 'Personal'),
(2, 'Business'),
(3, 'Corporate');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

DROP TABLE IF EXISTS `service`;
CREATE TABLE IF NOT EXISTS `service` (
  `serviceid` int(11) NOT NULL AUTO_INCREMENT,
  `servicename` varchar(25) NOT NULL,
  `interestrate` int(11) NOT NULL,
  PRIMARY KEY (`serviceid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`serviceid`, `servicename`, `interestrate`) VALUES
(1, 'Banking', 0),
(2, 'Investment', 0),
(5, 'Insurance', 0),
(6, 'Checking', 0),
(7, 'Savings', 2);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

DROP TABLE IF EXISTS `transaction`;
CREATE TABLE IF NOT EXISTS `transaction` (
  `transactionid` int(11) NOT NULL,
  `clientid` int(11) NOT NULL,
  `accountid` int(11) NOT NULL,
  `date` date NOT NULL,
  `transactionfeecharged` decimal(10,0) NOT NULL,
  `amount` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transaction`
--


-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `username` varchar(15) NOT NULL,
  `employeeid` int(11) NOT NULL,
  `clientid` int(11) NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--


