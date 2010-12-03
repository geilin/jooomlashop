-- phpMyAdmin SQL Dump
-- version 2.10.2
-- http://www.phpmyadmin.net
-- 
-- Host: localhost
-- Generation Time: Aug 24, 2009 at 10:42 PM
-- Server version: 5.0.45
-- PHP Version: 5.2.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- Database: `1hdt`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `#__w_categories`
-- 

DROP TABLE IF EXISTS `#__w_categories`;
CREATE TABLE `#__w_categories` (
  `id` int(11) NOT NULL auto_increment,
  `parentid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `ordering` tinyint(4) NOT NULL,
  `published` tinyint(1) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

-- 
-- Dumping data for table `#__w_categories`
-- 

INSERT INTO `#__w_categories` VALUES (1, 0, 'TIVI PLASMA ', 0, 1);

-- --------------------------------------------------------

-- 
-- Table structure for table `#__w_comments`
-- 

DROP TABLE IF EXISTS `#__w_comments`;
CREATE TABLE `#__w_comments` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(30) NOT NULL,
  `content` text NOT NULL,
  `date` date NOT NULL,
  `published` tinyint(1) NOT NULL,
  `productid` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `rating` tinyint(1) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- 
-- Dumping data for table `#__w_comments`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `#__w_manufacturers`
-- 

DROP TABLE IF EXISTS `#__w_manufacturers`;
CREATE TABLE `#__w_manufacturers` (
  `id` int(11) NOT NULL auto_increment,
  `description` text NOT NULL,
  `name` varchar(50) NOT NULL,
  `ordering` tinyint(4) NOT NULL,
  `published` tinyint(1) NOT NULL,
  `image` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- 
-- Dumping data for table `#__w_manufacturers`
-- 

INSERT INTO `#__w_manufacturers` VALUES (4, '<p>test </p>', 'LG', 0, 1, '32ca8z-medium.jpg');

-- --------------------------------------------------------

-- 
-- Table structure for table `#__w_note`
-- 

DROP TABLE IF EXISTS `#__w_note`;
CREATE TABLE `#__w_note` (
  `id` int(11) NOT NULL auto_increment,
  `term` varchar(20) NOT NULL,
  `content` text NOT NULL,
  `ordering` tinyint(4) NOT NULL,
  `published` tinyint(1) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

-- 
-- Dumping data for table `#__w_note`
-- 

INSERT INTO `#__w_note` VALUES (1, 'test', 'this is test ha ha', 0, 1);
INSERT INTO `#__w_note` VALUES (2, 'BMW', 'xe vip', 0, 1);

-- --------------------------------------------------------

-- 
-- Table structure for table `#__w_orders`
-- 

DROP TABLE IF EXISTS `#__w_orders`;
CREATE TABLE `#__w_orders` (
  `id` int(11) NOT NULL auto_increment,
  `productid` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(250) NOT NULL,
  `message` text NOT NULL,
  `published` tinyint(1) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `#__w_orders`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `#__w_products`
-- 

DROP TABLE IF EXISTS `#__w_products`;
CREATE TABLE `#__w_products` (
  `id` int(11) NOT NULL auto_increment,
  `catid` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `code` varchar(10) NOT NULL,
  `originalprice` int(10) unsigned NOT NULL,
  `saleprice` int(10) unsigned NOT NULL,
  `monitorsize` varchar(5) NOT NULL,
  `currency` varchar(3) NOT NULL,
  `articles` text NOT NULL,
  `intro` text NOT NULL,
  `shortdesc` text NOT NULL,
  `description` text NOT NULL,
  `thumbnail` varchar(150) character set ucs2 collate ucs2_bin NOT NULL,
  `mediumimage` varchar(150) NOT NULL,
  `largeimage1` varchar(180) NOT NULL,
  `stock` tinyint(1) NOT NULL default '1',
  `date` date NOT NULL,
  `weight` varchar(20) NOT NULL,
  `ordering` int(11) NOT NULL,
  `hits` int(11) NOT NULL,
  `published` tinyint(1) NOT NULL,
  `manufacturerid` int(11) NOT NULL,
  `homepage` tinyint(1) NOT NULL,
  `largeimage2` varchar(180) default NULL,
  `largeimage3` varchar(180) default NULL,
  `largeimage4` varchar(180) default NULL,
  `largeimage5` varchar(180) default NULL,
  `largeimage6` varchar(180) default NULL,
  `largeimage7` varchar(180) default NULL,
  `largeimage8` varchar(180) default NULL,
  `largeimage9` varchar(180) default NULL,
  `largeimage10` varchar(180) default NULL,
  `largeimage11` varchar(180) default NULL,
  `largeimage12` varchar(180) default NULL,
  `largeimage13` varchar(180) default NULL,
  `largeimage14` varchar(180) default NULL,
  `largeimage15` varchar(180) default NULL,
  `largeimage16` varchar(180) default NULL,
  `largeimage17` varchar(180) default NULL,
  `largeimage18` varchar(180) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

-- 
-- Dumping data for table `#__w_products`
-- 

INSERT INTO `#__w_products` VALUES (5, 1, 'About Us', '', 234, 234, '32', 'VND', '', 'test', 'test', 'test', '', '', '', 1, '0000-00-00', '', 0, 0, 1, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
