DROP TABLE IF EXISTS `#__w_newsletter`;
CREATE TABLE `#__w_newsletter` (
  `id` int(11) NOT NULL auto_increment,
  `subject` varchar(50) NOT NULL,
  `header` text NOT NULL,
  `message` text NOT NULL,
  `html_message` text NOT NULL,
  `published` tinyint(1) NOT NULL default '0',
  `check_out` int(11) NOT NULL default '0',
  `check_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `publish_up` datetime NOT NULL default '0000-00-00 00:00:00',
  `publish_down` datetime NOT NULL default '0000-00-00 00:00:00',
  `created` datetime NOT NULL default '0000-00-00 00:00:00',
  `send` datetime NOT NULL default '0000-00-00 00:00:00',
  `hits` int(11) NOT NULL default '0',
  `sender` varchar(100) NOT NULL,
  `limit` int(11) NOT NULL default '0',
  `cat_id` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `#__w_newsletter`
-- 

INSERT INTO `#__w_newsletter` VALUES (1, 'Thu Quang Cao', 'Thu Quang Cao', 'test', 'test tet', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2009-05-25 13:05:39', '2009-05-28 00:00:09', 37, 'levanhen01@yahoo.com', 2, 2);

-- --------------------------------------------------------

-- 
-- Table structure for table `#__w_newsletter_categories`
-- 

DROP TABLE IF EXISTS `#__w_newsletter_categories`;
CREATE TABLE `#__w_newsletter_categories` (
  `id` int(11) NOT NULL auto_increment,
  `parent_id` int(11) NOT NULL default '0',
  `name` varchar(30) NOT NULL,
  `description` varchar(250) default NULL,
  `ordering` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `#__w_newsletter_categories`
-- 

INSERT INTO `#__w_newsletter_categories` VALUES (1, 0, 'Default', 'default', 0);


-- --------------------------------------------------------

-- 
-- Table structure for table `#__w_newsletter_contacts`
-- 

DROP TABLE IF EXISTS `#__w_newsletter_contacts`;
CREATE TABLE `#__w_newsletter_contacts` (
  `id` int(11) NOT NULL auto_increment,
  `subscriber_id` int(11) NOT NULL,
  `company` varchar(100) default NULL,
  `phone` varchar(12) default NULL,
  `address` varchar(200) default NULL,
  `hobby` varchar(250) default NULL,
  `note` text,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `subscriber_id` (`subscriber_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `#__w_newsletter_contacts`
-- 

INSERT INTO `#__w_newsletter_contacts` VALUES (1, 1, 'Tu Van Kiem Dinh', '0986083735', '640 Le Trong Tan', 'du lich', 'khach hang tim nang');

-- --------------------------------------------------------

-- 
-- Table structure for table `#__w_newsletter_subscribers`
-- 

DROP TABLE IF EXISTS `#__w_newsletter_subscribers`;
CREATE TABLE `#__w_newsletter_subscribers` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL default '0',
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `confirmed` tinyint(1) NOT NULL default '0',
  `date` datetime NOT NULL default '0000-00-00 00:00:00',
  `cat_id` varchar(5) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `#__w_newsletter_subscribers`
-- 

INSERT INTO `#__w_newsletter_subscribers` VALUES (1, 0, 'Le Van Hen', 'leanhen@yahoo.com', 1, '2009-05-27 08:05:00', '0');
