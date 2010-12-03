-- phpMyAdmin SQL Dump
-- version 3.3.5.1
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Mar 02 Novembre 2010 à 17:51
-- Version du serveur: 5.0.67
-- Version de PHP: 5.2.14

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `wpdemo_thoitrang`
--

-- --------------------------------------------------------

--
-- Structure de la table `hdt_banner`
--

CREATE TABLE IF NOT EXISTS `hdt_banner` (
  `bid` int(11) NOT NULL auto_increment,
  `cid` int(11) NOT NULL default '0',
  `type` varchar(30) NOT NULL default 'banner',
  `name` varchar(255) NOT NULL default '',
  `alias` varchar(255) NOT NULL default '',
  `imptotal` int(11) NOT NULL default '0',
  `impmade` int(11) NOT NULL default '0',
  `clicks` int(11) NOT NULL default '0',
  `imageurl` varchar(100) NOT NULL default '',
  `clickurl` varchar(200) NOT NULL default '',
  `date` datetime default NULL,
  `showBanner` tinyint(1) NOT NULL default '0',
  `checked_out` tinyint(1) NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `editor` varchar(50) default NULL,
  `custombannercode` text,
  `catid` int(10) unsigned NOT NULL default '0',
  `description` text NOT NULL,
  `sticky` tinyint(1) unsigned NOT NULL default '0',
  `ordering` int(11) NOT NULL default '0',
  `publish_up` datetime NOT NULL default '0000-00-00 00:00:00',
  `publish_down` datetime NOT NULL default '0000-00-00 00:00:00',
  `tags` text NOT NULL,
  `params` text NOT NULL,
  PRIMARY KEY  (`bid`),
  KEY `viewbanner` (`showBanner`),
  KEY `idx_banner_catid` (`catid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `hdt_banner`
--


-- --------------------------------------------------------

--
-- Structure de la table `hdt_bannerclient`
--

CREATE TABLE IF NOT EXISTS `hdt_bannerclient` (
  `cid` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL default '',
  `contact` varchar(255) NOT NULL default '',
  `email` varchar(255) NOT NULL default '',
  `extrainfo` text NOT NULL,
  `checked_out` tinyint(1) NOT NULL default '0',
  `checked_out_time` time default NULL,
  `editor` varchar(50) default NULL,
  PRIMARY KEY  (`cid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `hdt_bannerclient`
--


-- --------------------------------------------------------

--
-- Structure de la table `hdt_bannertrack`
--

CREATE TABLE IF NOT EXISTS `hdt_bannertrack` (
  `track_date` date NOT NULL,
  `track_type` int(10) unsigned NOT NULL,
  `banner_id` int(10) unsigned NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `hdt_bannertrack`
--


-- --------------------------------------------------------

--
-- Structure de la table `hdt_categories`
--

CREATE TABLE IF NOT EXISTS `hdt_categories` (
  `id` int(11) NOT NULL auto_increment,
  `parent_id` int(11) NOT NULL default '0',
  `title` varchar(255) NOT NULL default '',
  `name` varchar(255) NOT NULL default '',
  `alias` varchar(255) NOT NULL default '',
  `image` varchar(255) NOT NULL default '',
  `section` varchar(50) NOT NULL default '',
  `image_position` varchar(30) NOT NULL default '',
  `description` text NOT NULL,
  `published` tinyint(1) NOT NULL default '0',
  `checked_out` int(11) unsigned NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `editor` varchar(50) default NULL,
  `ordering` int(11) NOT NULL default '0',
  `access` tinyint(3) unsigned NOT NULL default '0',
  `count` int(11) NOT NULL default '0',
  `params` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `cat_idx` (`section`,`published`,`access`),
  KEY `idx_access` (`access`),
  KEY `idx_checkout` (`checked_out`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `hdt_categories`
--

INSERT INTO `hdt_categories` (`id`, `parent_id`, `title`, `name`, `alias`, `image`, `section`, `image_position`, `description`, `published`, `checked_out`, `checked_out_time`, `editor`, `ordering`, `access`, `count`, `params`) VALUES
(3, 0, 'wamp.vn', '', 'wampvn', '', 'com_contact_details', 'left', '', 1, 0, '0000-00-00 00:00:00', NULL, 1, 0, 0, ''),
(4, 0, 'Chia sẻ kinh nghiệm', '', 'chia-se-kinh-nghiem', '', '1', 'left', '', 1, 0, '0000-00-00 00:00:00', NULL, 3, 0, 0, ''),
(5, 0, 'Tin tức BlackBerry', '', 'tin-tuc-blackberry', '', '1', 'left', '', 1, 0, '0000-00-00 00:00:00', NULL, 4, 0, 0, ''),
(6, 0, 'Tin tức', '', 'tin-tuc', '', '1', 'left', '', 1, 0, '0000-00-00 00:00:00', NULL, 5, 0, 0, '');

-- --------------------------------------------------------

--
-- Structure de la table `hdt_components`
--

CREATE TABLE IF NOT EXISTS `hdt_components` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(50) NOT NULL default '',
  `link` varchar(255) NOT NULL default '',
  `menuid` int(11) unsigned NOT NULL default '0',
  `parent` int(11) unsigned NOT NULL default '0',
  `admin_menu_link` varchar(255) NOT NULL default '',
  `admin_menu_alt` varchar(255) NOT NULL default '',
  `option` varchar(50) NOT NULL default '',
  `ordering` int(11) NOT NULL default '0',
  `admin_menu_img` varchar(255) NOT NULL default '',
  `iscore` tinyint(4) NOT NULL default '0',
  `params` text NOT NULL,
  `enabled` tinyint(4) NOT NULL default '1',
  PRIMARY KEY  (`id`),
  KEY `parent_option` (`parent`,`option`(32))
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=58 ;

--
-- Contenu de la table `hdt_components`
--

INSERT INTO `hdt_components` (`id`, `name`, `link`, `menuid`, `parent`, `admin_menu_link`, `admin_menu_alt`, `option`, `ordering`, `admin_menu_img`, `iscore`, `params`, `enabled`) VALUES
(1, 'Banners', '', 0, 0, '', 'Banner Management', 'com_banners', 0, 'js/ThemeOffice/component.png', 0, 'track_impressions=0\ntrack_clicks=0\ntag_prefix=\n\n', 1),
(2, 'Banners', '', 0, 1, 'option=com_banners', 'Active Banners', 'com_banners', 1, 'js/ThemeOffice/edit.png', 0, '', 1),
(3, 'Clients', '', 0, 1, 'option=com_banners&c=client', 'Manage Clients', 'com_banners', 2, 'js/ThemeOffice/categories.png', 0, '', 1),
(7, 'Contacts', 'option=com_contact', 0, 0, '', 'Edit contact details', 'com_contact', 0, 'js/ThemeOffice/component.png', 1, 'contact_icons=0\nicon_address=\nicon_email=\nicon_telephone=\nicon_fax=\nicon_misc=\nshow_headings=1\nshow_position=1\nshow_email=0\nshow_telephone=1\nshow_mobile=1\nshow_fax=1\nbannedEmail=\nbannedSubject=\nbannedText=\nsession=1\ncustomReply=0\n\n', 1),
(8, 'Contacts', '', 0, 7, 'option=com_contact', 'Edit contact details', 'com_contact', 0, 'js/ThemeOffice/edit.png', 1, '', 1),
(9, 'Categories', '', 0, 7, 'option=com_categories&section=com_contact_details', 'Manage contact categories', '', 2, 'js/ThemeOffice/categories.png', 1, 'contact_icons=0\nicon_address=\nicon_email=\nicon_telephone=\nicon_fax=\nicon_misc=\nshow_headings=1\nshow_position=1\nshow_email=0\nshow_telephone=1\nshow_mobile=1\nshow_fax=1\nbannedEmail=\nbannedSubject=\nbannedText=\nsession=1\ncustomReply=0\n\n', 1),
(10, 'Polls', 'option=com_poll', 0, 0, 'option=com_poll', 'Manage Polls', 'com_poll', 0, 'js/ThemeOffice/component.png', 0, '', 1),
(34, 'WysiwygPro3', '', 0, 0, '', 'WysiwygPro3', 'com_wysiwygpro3', 0, '', 0, '', 1),
(14, 'User', 'option=com_user', 0, 0, '', '', 'com_user', 0, '', 1, '', 1),
(15, 'Search', 'option=com_search', 0, 0, 'option=com_search', 'Search Statistics', 'com_search', 0, 'js/ThemeOffice/component.png', 1, 'enabled=0\n\n', 1),
(16, 'Categories', '', 0, 1, 'option=com_categories&section=com_banner', 'Categories', '', 3, '', 1, '', 1),
(17, 'Wrapper', 'option=com_wrapper', 0, 0, '', 'Wrapper', 'com_wrapper', 0, '', 1, '', 1),
(18, 'Mail To', '', 0, 0, '', '', 'com_mailto', 0, '', 1, '', 1),
(19, 'Media Manager', '', 0, 0, 'option=com_media', 'Media Manager', 'com_media', 0, '', 1, 'upload_extensions=bmp,csv,doc,epg,gif,ico,jpg,odg,odp,ods,odt,pdf,png,ppt,swf,txt,xcf,xls,BMP,CSV,DOC,EPG,GIF,ICO,JPG,ODG,ODP,ODS,ODT,PDF,PNG,PPT,SWF,TXT,XCF,XLS\nupload_maxsize=10000000\nfile_path=images\nimage_path=images\nrestrict_uploads=1\ncheck_mime=1\nimage_extensions=bmp,gif,jpg,png\nignore_extensions=\nupload_mime=image/jpeg,image/gif,image/png,image/bmp,application/x-shockwave-flash,application/msword,application/excel,application/pdf,application/powerpoint,text/plain,application/x-zip\nupload_mime_illegal=text/html\nenable_flash=0\n\n', 1),
(20, 'Articles', 'option=com_content', 0, 0, '', '', 'com_content', 0, '', 1, 'show_noauth=0\nshow_title=1\nlink_titles=0\nshow_intro=1\nshow_section=0\nlink_section=0\nshow_category=0\nlink_category=0\nshow_author=0\nshow_create_date=1\nshow_modify_date=0\nshow_item_navigation=0\nshow_readmore=1\nshow_vote=0\nshow_icons=0\nshow_pdf_icon=0\nshow_print_icon=0\nshow_email_icon=0\nshow_hits=1\nfeed_summary=0\nfilter_tags=\nfilter_attritbutes=\n\n', 1),
(21, 'Configuration Manager', '', 0, 0, '', 'Configuration', 'com_config', 0, '', 1, '', 1),
(22, 'Installation Manager', '', 0, 0, '', 'Installer', 'com_installer', 0, '', 1, '', 1),
(23, 'Language Manager', '', 0, 0, '', 'Languages', 'com_languages', 0, '', 1, 'site=vi-VN\n\n', 1),
(24, 'Mass mail', '', 0, 0, '', 'Mass Mail', 'com_massmail', 0, '', 1, 'mailSubjectPrefix=\nmailBodySuffix=\n\n', 1),
(25, 'Menu Editor', '', 0, 0, '', 'Menu Editor', 'com_menus', 0, '', 1, '', 1),
(27, 'Messaging', '', 0, 0, '', 'Messages', 'com_messages', 0, '', 1, '', 1),
(28, 'Modules Manager', '', 0, 0, '', 'Modules', 'com_modules', 0, '', 1, '', 1),
(29, 'Plugin Manager', '', 0, 0, '', 'Plugins', 'com_plugins', 0, '', 1, '', 1),
(30, 'Template Manager', '', 0, 0, '', 'Templates', 'com_templates', 0, '', 1, '', 1),
(31, 'User Manager', '', 0, 0, '', 'Users', 'com_users', 0, '', 1, 'allowUserRegistration=0\nnew_usertype=Registered\nuseractivation=1\nfrontend_userparams=0\n\n', 1),
(32, 'Cache Manager', '', 0, 0, '', 'Cache', 'com_cache', 0, '', 1, '', 1),
(33, 'Control Panel', '', 0, 0, '', 'Control Panel', 'com_cpanel', 0, '', 1, '', 1),
(35, 'Products', 'option=com_products', 0, 0, 'option=com_products', 'Products', 'com_products', 0, 'js/ThemeOffice/component.png', 0, 'publised_comment=0\nemail_contact=knigherrant@yahoo.com\nlimit1=12\nlimit2=12\nid_article=15\ntext_price=Sap co hang\n\n', 1),
(39, 'Categories', '', 0, 35, 'option=com_products&controller=category', 'Categories', 'com_products', 4, 'js/ThemeOffice/component.png', 0, '', 1),
(36, 'Products', '', 0, 35, 'option=com_products', 'Product', 'com_products', 0, 'js/ThemeOffice/component.png', 0, '', 1),
(37, 'Manufacturer', '', 0, 35, 'option=com_products&controller=manufacturer', 'Manufacturer', 'com_products', 5, 'js/ThemeOffice/component.png', 0, '', 1),
(38, 'Comments', '', 0, 35, 'option=com_products&controller=comment', 'Comments', 'com_products', 3, 'js/ThemeOffice/component.png', 0, '', 1),
(55, 'Property', '', 0, 35, 'option=com_products&controller=property', 'Property', 'com_products', 6, 'js/ThemeOffice/component.png', 0, '', 1),
(43, 'User Manager', 'option=com_wuser', 0, 0, 'option=com_wuser', 'User Manager', 'com_wuser', 0, 'js/ThemeOffice/component.png', 0, '', 1),
(44, 'Newsletter', 'option=com_wnewsletter', 0, 0, 'option=com_wnewsletter', 'Wamp Newsletter', 'com_wnewsletter', 0, 'js/ThemeOffice/component.png', 0, '', 1),
(45, 'Newsletter  Manger', '', 0, 44, 'option=com_wnewsletter', 'Newsletter  Manger', 'com_wnewsletter', 0, 'js/ThemeOffice/component.png', 0, '', 1),
(46, 'Subcriber  Manger', '', 0, 44, 'option=com_wnewsletter&task=subscriber', 'Subcriber  Manger', 'com_wnewsletter', 1, 'js/ThemeOffice/component.png', 0, '', 1),
(47, 'Contact  Manger', '', 0, 44, 'option=com_wnewsletter&task=contact', 'Contact  Manger', 'com_wnewsletter', 2, 'js/ThemeOffice/component.png', 0, '', 1),
(48, 'Category Manger', '', 0, 44, 'option=com_wnewsletter&task=category', 'Category  Manger', 'com_wnewsletter', 3, 'js/ThemeOffice/component.png', 0, '', 1),
(56, 'Orders', '', 0, 35, 'option=com_products&controller=order', 'orders', 'com_products', 7, 'js/ThemeOffice/component.png', 0, '', 1);

-- --------------------------------------------------------

--
-- Structure de la table `hdt_contact_details`
--

CREATE TABLE IF NOT EXISTS `hdt_contact_details` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL default '',
  `alias` varchar(255) NOT NULL default '',
  `con_position` varchar(255) default NULL,
  `address` text,
  `suburb` varchar(100) default NULL,
  `state` varchar(100) default NULL,
  `country` varchar(100) default NULL,
  `postcode` varchar(100) default NULL,
  `telephone` varchar(255) default NULL,
  `fax` varchar(255) default NULL,
  `misc` mediumtext,
  `image` varchar(255) default NULL,
  `imagepos` varchar(20) default NULL,
  `email_to` varchar(255) default NULL,
  `default_con` tinyint(1) unsigned NOT NULL default '0',
  `published` tinyint(1) unsigned NOT NULL default '0',
  `checked_out` int(11) unsigned NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `ordering` int(11) NOT NULL default '0',
  `params` text NOT NULL,
  `user_id` int(11) NOT NULL default '0',
  `catid` int(11) NOT NULL default '0',
  `access` tinyint(3) unsigned NOT NULL default '0',
  `mobile` varchar(255) NOT NULL default '',
  `webpage` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`id`),
  KEY `catid` (`catid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `hdt_contact_details`
--

INSERT INTO `hdt_contact_details` (`id`, `name`, `alias`, `con_position`, `address`, `suburb`, `state`, `country`, `postcode`, `telephone`, `fax`, `misc`, `image`, `imagepos`, `email_to`, `default_con`, `published`, `checked_out`, `checked_out_time`, `ordering`, `params`, `user_id`, `catid`, `access`, `mobile`, `webpage`) VALUES
(1, 'WAMPvn Co., Ltd', 'wampvn-co-ltd', 'WAMPvn Co., Ltd', 'Địa chỉ: 6 Vĩnh Hội, P4, Q4, HCM ', '', '', '', '', '086 678 2316', '(084) 835. 4915  ', '', '', NULL, 'levanhen@wampvn.com', 0, 1, 0, '0000-00-00 00:00:00', 1, 'show_name=0\nshow_position=1\nshow_email=1\nshow_street_address=1\nshow_suburb=1\nshow_state=0\nshow_postcode=0\nshow_country=0\nshow_telephone=1\nshow_mobile=1\nshow_fax=1\nshow_webpage=1\nshow_misc=0\nshow_image=0\nallow_vcard=0\ncontact_icons=0\nicon_address=\nicon_email=\nicon_telephone=\nicon_mobile=\nicon_fax=\nicon_misc=\nshow_email_form=1\nemail_description=\nshow_email_copy=1\nbanned_email=\nbanned_subject=\nbanned_text=', 62, 3, 0, '', '');

-- --------------------------------------------------------

--
-- Structure de la table `hdt_content`
--

CREATE TABLE IF NOT EXISTS `hdt_content` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `title` varchar(255) NOT NULL default '',
  `alias` varchar(255) NOT NULL default '',
  `title_alias` varchar(255) NOT NULL default '',
  `introtext` mediumtext NOT NULL,
  `fulltext` mediumtext NOT NULL,
  `state` tinyint(3) NOT NULL default '0',
  `sectionid` int(11) unsigned NOT NULL default '0',
  `mask` int(11) unsigned NOT NULL default '0',
  `catid` int(11) unsigned NOT NULL default '0',
  `created` datetime NOT NULL default '0000-00-00 00:00:00',
  `created_by` int(11) unsigned NOT NULL default '0',
  `created_by_alias` varchar(255) NOT NULL default '',
  `modified` datetime NOT NULL default '0000-00-00 00:00:00',
  `modified_by` int(11) unsigned NOT NULL default '0',
  `checked_out` int(11) unsigned NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `publish_up` datetime NOT NULL default '0000-00-00 00:00:00',
  `publish_down` datetime NOT NULL default '0000-00-00 00:00:00',
  `images` text NOT NULL,
  `urls` text NOT NULL,
  `attribs` text NOT NULL,
  `version` int(11) unsigned NOT NULL default '1',
  `parentid` int(11) unsigned NOT NULL default '0',
  `ordering` int(11) NOT NULL default '0',
  `metakey` text NOT NULL,
  `metadesc` text NOT NULL,
  `access` int(11) unsigned NOT NULL default '0',
  `hits` int(11) unsigned NOT NULL default '0',
  `metadata` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `idx_section` (`sectionid`),
  KEY `idx_access` (`access`),
  KEY `idx_checkout` (`checked_out`),
  KEY `idx_state` (`state`),
  KEY `idx_catid` (`catid`),
  KEY `idx_createdby` (`created_by`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=91 ;

--
-- Contenu de la table `hdt_content`
--

INSERT INTO `hdt_content` (`id`, `title`, `alias`, `title_alias`, `introtext`, `fulltext`, `state`, `sectionid`, `mask`, `catid`, `created`, `created_by`, `created_by_alias`, `modified`, `modified_by`, `checked_out`, `checked_out_time`, `publish_up`, `publish_down`, `images`, `urls`, `attribs`, `version`, `parentid`, `ordering`, `metakey`, `metadesc`, `access`, `hits`, `metadata`) VALUES
(1, 'Mua hàng', 'mua-hang', '', '<p><img src="images/bbs/delivery.jpg" border="0" /></p>\r\n<p class="MsoNormal" style="padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; margin-top: 15px; margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 12pt; "><span class="Apple-style-span" style="color: #666666; font-family: Arial, Helvetica, sans-serif; line-height: 18px; "> </span><span style="color: #3366cc;"><strong style="padding: 0px; margin: 0px;"><span style="padding: 0px; margin: 0px;">Tìm hiểu sản phẩm - Liên hệ mua  hàng:</span></strong></span></p>\r\n<p class="MsoNormal" style="padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; margin-top: 15px; margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 12pt; "><span style="padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: #5d5d5d; ">Xem thông tin sản phẩm Quý khách đang quan tâm trên tại <span style="padding: 0px; margin: 0px;">BlackBerry Sài Gòn | BBSaigon.com</span></span><span style="padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: #5d5d5d; "> </span><span style="padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: #5d5d5d; "> </span></p>\r\n<p><span class="Apple-style-span" style="color: #666666; font-family: Arial, Helvetica, sans-serif; line-height: 18px; ">\r\n<p class="MsoNormal" style="padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; margin-top: 15px; margin-right: 0px; margin-bottom: 15px; margin-left: 0px; line-height: 12pt; "><span style="padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: #5d5d5d; ">Khi cần tư vấn thêm về sản phẩm, Quý khách hãy sử dụng chức năng tư vấn trực tuyến của chúng tôi tại mục "<span style="padding: 0px; margin: 0px;">Hỗ trợ Online</span>” ở phía banner bên trái hoặc gọi đến số điện thoại <span style="padding: 0px; margin: 0px;">0903.183.183</span>.</span></p>\r\n<p class="MsoNormal" style="padding: 0px; margin: 15px 0px; line-height: 12pt;"><span style="padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: #5d5d5d; ">Sau khi đã chọn được sản phẩm cần mua, Quý khách có<strong style="padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; "> </strong>thể gọi trực tiếp cho chúng tôi qua số điện thoại <span style="padding: 0px; margin: 0px;">0903.183.183</span> để đặt hàng hoặc tới trực tiếp địa chỉ </span><span style="padding: 0px; margin: 0px; color: #5d5d5d;"><span style="padding: 0px; margin: 0px;">BlackBerry Sài Gòn</span></span><span style="padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: #5d5d5d; "> để mua hàng.</span></p>\r\n<p class="MsoNormal" style="padding: 0px; margin: 15px 0px; line-height: 12pt;"><span style="padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: #5d5d5d; "><span style="color: #3366cc;"><strong>Thanh Toán:</strong></span><br /></span></p>\r\n<p class="MsoNormal" style="padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; margin-top: 0.1in; margin-right: 0in; margin-bottom: 0.1in; margin-left: 0in; line-height: 12pt; "><strong style="padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; "><span style="padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: #5d5d5d; ">Đối với khách hàng tại TP.HCM:<br style="padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; " /><br style="padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; " /></span></strong><strong style="padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; "><span style="padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: #5d5d5d; "><span class="Apple-style-span" style="padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-weight: normal; ">Sau khi Quý khách gọi điện đặt hàng, chúng tôi sẽ xác nhận địa chỉ nhận hàng và chúng tôi sẽ giao hàng ngay, nhận hàng xong khách hàng mới thanh toán.</span></span></strong><span style="padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: #5d5d5d; "> </span></p>\r\n<p class="MsoNormal" style="padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; margin-top: 15px; margin-right: 0px; margin-bottom: 15px; margin-left: 0px; "><span style="padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: #5d5d5d; "><span class="Apple-style-span" style="padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; font-weight: bold; ">Đối với khách hàng ở xa:</span></span><strong style="padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; "> </strong></p>\r\n</span></p>\r\n<p><span class="Apple-style-span" style="color: #666666; font-family: Arial, Helvetica, sans-serif; line-height: 18px; ">\r\n<p><strong>1.</strong> Thanh toán bằng chuyển  khoản:</p>\r\n<p>Tên tài  khoản:<span style="color: #ffffff;">..........</span>Nguyễn Đình Khoa<br />Số tài khoản:<span style="color: #ffffff;">............</span>007.1000.846.678<br />Ngân hàng:<span style="color: #ffffff;">...............</span>Vietcombank  – Chi nhánh Bến Thành</p>\r\n<p><strong>2.</strong> Thanh toán qua bưu điện:</p>\r\n<p>Người  nhận:<span style="color: #ffffff;">..............</span>Nguyễn  Đình Khoa<br />Địa chỉ:<span style="color: #ffffff;">......................</span>157/20  đường 3/2, F.11, Q.10, TP.HCM</p>\r\n<p style="padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; margin-top: 15px; margin-right: 0px; margin-bottom: 15px; margin-left: 0px; ">Quý khách ghi rõ họ tên, chi tiết thanh toán, ngay sau khi nhận được tiền chúng tôi sẽ chuyển hàng cho Quý khách trong vòng 24h, gởi chuyển phát nhanh EMS, TTC, Nasco bảo đảm. Chi phí gởi tùy mặt hàng, chúng tôi sẽ báo khi Quý khách gọi điện đặt hàng, vui lòng cộng vào giá mặt hàng được niêm yết trên website.</p>\r\n<p style="padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; margin-top: 15px; margin-right: 0px; margin-bottom: 15px; margin-left: 0px; "><span style="color: #3366cc;"><strong>Giao Hàng:</strong></span></p>\r\n<p style="padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; margin-top: 15px; margin-right: 0px; margin-bottom: 15px; margin-left: 0px; "><strong style="padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; "><span style="padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: #5d5d5d; ">1.</span></strong><span style="padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: #5d5d5d; "> Chúng tôi sẽ phục vụ giao hàng miễn phí cho quý khách trong nội thành như sau: Q1, Q3, Q4, Q5, Q,7, Q10, Q11, Phú Nhuận, Tân Bình.</span></p>\r\n<p style="padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; margin-top: 15px; margin-right: 0px; margin-bottom: 15px; margin-left: 0px; "><span style="padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: #5d5d5d; "><strong>2.</strong> Đối với những địa chỉ không thuộc phạm vi nội thành, sẽ có chi phí phát sinh.<br /></span></p>\r\n<p style="padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; margin-top: 15px; margin-right: 0px; margin-bottom: 15px; margin-left: 0px; "><span style="padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; color: #5d5d5d; ">Mọi thắc mắc Quý khách vui lòng liên lạc qua số điện thoại 0903.183.183.<br /></span></p>\r\n</span></p>\r\n<p><span class="Apple-style-span" style="color: #666666; font-family: Arial, Helvetica, sans-serif; line-height: 18px; "> </span></p>', '', 1, 0, 0, 0, '2009-08-28 12:43:17', 62, '', '2010-07-08 13:59:58', 62, 0, '0000-00-00 00:00:00', '2009-08-28 12:43:17', '0000-00-00 00:00:00', '', '', 'show_title=0\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=0\nshow_create_date=0\nshow_modify_date=\nshow_pdf_icon=0\nshow_print_icon=0\nshow_email_icon=0\nlanguage=\nkeyref=\nreadmore=', 53, 0, 4, '', '', 0, 1081, 'robots=\nauthor='),
(77, '  Lịch sử phát triển của BlackBerry RIM', '-lich-su-phat-trien-cua-blackberry-rim', '', '<p>tttewtw</p>', '', -2, 1, 0, 5, '2010-07-01 13:44:02', 62, '', '2010-07-01 15:01:38', 62, 0, '0000-00-00 00:00:00', '2010-07-01 13:44:02', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 3, 0, 0, '', '', 0, 1, 'robots=\nauthor='),
(78, '  Lịch sử phát triển của BlackBerry RIM', '-lich-su-phat-trien-cua-blackberry-rim', '', '<p>tttewtw</p>', '', -2, 1, 0, 5, '2010-07-01 13:44:02', 62, '', '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', '2010-07-01 13:44:02', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 1, 0, 0, '', '', 0, 1, 'robots=\nauthor='),
(79, 'Lịch sử phát triển của BlackBerry', 'lich-su-phat-trien-cua-blackberry', '', '<p><strong> </strong></p>\r\n<p><strong>Lịch sử ra đời của smartphone Blackberry, thông tin có ích nhất cho người dùng Blackberry cần tìm hiểu về lịch sử của dòng điện thoại thông minh được ưa chuộng nhất tại các nước phát triển và đang phát triển.           \r\n', '\r\n</strong></p>\r\n<p>Ra đời năm 1999 tại Canada, khi chuyên gia đặt tên trông thấy bàn phím nhập liệu của sản phẩm đầu tiên đã buột miệng "trông giống như hạt dâu tây ấy nhỉ - "Like tiny seeds of strawberry", nhưng "straw" khi phát âm có vẻ dài, chậm và không mạnh mẽ. Sau một vài gợi ý khác, cái tên "BlackBerry" (Quả mâm xôi) - trông cũng rất giống với dâu tây - đã được đặt cho "Giải pháp Email không dây di động chuyên nghiệp, giúp truy cập dịch vụ Email dễ dàng dù ở bất kì đâu" (A wireless Email solution for mobile professionals. It provides easy access to your Business Email wherever you go - Bạn có thể thấy dòng chữ này ngay ở kết quả tìm kiếm đầu tiên trên Google). Và xin hãy ghi nhớ các từ "giải pháp chuyên nghiệp" khi nhắc đến BlackBerry (BB).</p>\r\n<p style="text-align: center;"><img class="border_img" src="images/news/0610/reseach-in-motion.jpg" border="0" /></p>\r\n<p>Blackberry còn một cái tên nữa là CRACKBERRY - nhờ vào khả năng truy cập Email theo thời gian thực. Do sự phổ biến của tên này, từ "crackberry" đã được đưa vào từ điển Webster tháng 11/2006, và được bình chọn là từ mới của năm.</p>\r\n<p>Khi cầm BB trên hai tay, bạn trẻ cảm nhận được ngay sự chắc chắn về kết cấu, và hoàn toàn thoải mái chat, chơi games trên bàn phím thiết kế rất khoa học. Còn các doanh nhân? Hãy tự tin soạn thảo email, viết báo cáo và khám phá sự thú vị của phím Alt độc đáo, tính năng soạn thảo thông minh với cách tạo các phím tắt, cụm từ, ngữ hay dùng AutoText... Tuyệt chiêu soạn thảo này của BB thì các hãng ĐTDĐ khác chỉ bắt chước được phần xác - bàn phím qwerty và trackwheel, chứ không thể bắt chước được phần hồn: Phần mềm cực kì thông minh... Và xin hãy yên tâm, chỉ với đường truyền GPRS eo hẹp, Email của bạn vẫn được gửi đi nhanh chóng không ngờ. Bạn cũng có thể nhận Email mới thuận tiện như tin nhắn SMS, thuật ngữ chuyên môn gọi là Pushmail: tự động nhận báo cáo Email mới, duyệt tiêu đề, nội dung trước, nếu thấy cần thiết thì mới tải về.</p>\r\n<p>Cũng nằm trong giải pháp của RIM, các bạn có thể truy cập dữ liệu máy tính cá nhân hay máy chủ doanh nghiệp từ xa ngay bằng BB trên tay. Với dịch vụ hấp dẫn này, trên nền hệ thống BES - BlackBerry Enterprise Service - chủ yếu dành cho doanh nghiệp để giảm thiểu nhân sự IT- RIM đã thiết kế ra BB. Và nó quá độc đáo, mang tính đột phá mà chưa thiết bị cầm tay nào làm tốt đến như vậy</p>\r\n<p>Giao diện của BB hiển thị toàn bộ các ứng dụng ngay trên màn hình - thường là rất lớn so với 1 chiếc ĐTDD và không bị lóa dưới ánh nắng mặt trời - đem lại sự thân thiện mà sau này các thiết bị Palm được khen ngợi,còn các thiết bị chạy Windows Mobile thì đang cố loay hoay để bắt chước. Giao diện này cũng được Apple khôn ngoan lựa chọn cho iPhone cùng HĐH MAC OS X. Việc lựa chọn ứng dụng trên BB được điều khiển bằng phím cuộn thông minh trackwheel rất thú vị vì tính linh hoạt, tương tự như "chuột " trên máy tính và còn hơn thế nữa</p>\r\n<p>Chạy trên hệ điều hành RIM riêng biệt, chứ không phải Windows Mobile, Palm OS, Symbian, hay Linux của các ông lớn, BB rất nhanh, mượt và gần như không bao giờ người dùng biết đến "Reset" - khởi động lại máy vì bị "treo" như ở các dòng khác. Hệ điều hành RIM tương thích với các ứng dụng gọn nhẹ nhưng hiệu quả viết bằng ngôn ngữ java - ngôn ngữ phổ thông cho phần mềm ĐTDD.</p>\r\n<p><strong>Chặng đường 10 năm phát triển Blackberry RIM</strong></p>\r\n<p>Đã là 11 năm kể từ khi mà Research In Motion (RIM) giới thiệu chiếc BlackBerry đầu tiên. Và trong 10 năm đó, BlackBerry như là biểu tượng của chiếc máy hỗ trợ cá nhân tốt nhất với các trình danh bạ, ghi chú, nhắc việc, lịch và Email. Từ những thiết kế và tính năng thô sơ nhất ở thuở ban đầu BlackBerry bây giờ đã được trang bị đầu đủ các tính năng của một chiếc máy hỗ trợ cá nhân hiện đại nhất. Và bạn sẽ không phải ngạc nhiên lắm khi ra đường mà thấy nhiều người cắm cúi nhìn vào chiếc BlackBerry, BlackBerry đã tạo ra được hẳn một cộng đồng "nghiện BlackBerry", không chỉ Bắc Mỹ, Châu Âu mà còn ở khắp các nước khác, dĩ nhiên là có ở Việt Nam.</p>\r\n<p>Với việc những chiếc Bold được giới thiệu (đã nhanh chóng xuất hiện ở Việt Nam) cho ta thấy RIM không những tiếp tục ứng dụng các công nghệ mới vào BlackBerry mà còn duy trì được cái truyền thống mà họ đã giữ trong 10 năm nay. Xin giới thiệu quá trình 10 năm phát triển của RIM qua những chiếc BlackBerry.</p>\r\n<p><strong>1. Máy nhắn tin RIM Inter@ctive Pager 950:</strong></p>\r\n<p style="text-align: center;"><strong><img src="images/news/0610/blackberry-page-950.jpg" border="0" /></strong></p>\r\n<p>Ngày 26 tháng 8 năm 1998, RIM chính thức giới thiệu Inter@ctive Pager 950. Chức năng chính của Paper 950 là gửi và nhận tin nhắn, email, fax... Paper được gắn vi xử lý 32 Bit Intel 386 với 1Mb bộ nhớ và 204Kbytes SRAM.</p>\r\n<p>Paper 950 với màn hình LCD có đèn phía dưới, có thể hiển thị 8 hoặc 6 dòng - tuỳ chọn - bàn phím 31 phím xếp theo kiểu bàn phím máy tính; một bánh xe điều khiển giống như là chuột máy tính, giữ chắc năng chính. Danh bạ của Pager 950 có thể chứa được 1000 liên lạc. Paper 950 được nuôi bởi 1 viên pin AA.</p>\r\n<p><strong>2. RIM 957 - Wireless Handheld:</strong></p>\r\n<p style="text-align: center;"><img src="images/news/0610/blackberry-957.jpg" border="0" /></p>\r\n<p>RIM 957 Wireless Handheld được thiết kế nhưng là nền tảng cho tất cả các máy BlackBerry sau này. Nó thực sự là linh hồn trong thiết kế của BlackBerry trong 10 năm qua, kể cả Bold mới giới thiệu cũng mang trên mình cái nét chính từ 957 Wireless Handheld.</p>\r\n<p>Một chiến dịch mang tên "Always on, Always connected" đã được RIM tiến hành rầm rộ để quảng bá cho RIM 957. Qua cái tên của chiến dịch ta cũng thấy được RIM muốn truyền thông điệp gì. Với việc hỗ trợ email không dây một cách toàn diện và những tính năng như thông báo chứng khoán tự động của 957 khiến nó trở thành thiết bị hỗ trợ kinh doanh hiện đại tốt nhất thời đó. Ngoài ra 957 còn có thể đồng bộ hóa với máy tính để đồng bộ các thông tin cá nhân như danh bạ, ghi chú, lịch làm việc, việc phải làm... thông qua phần mêm đồng bộ nổi tiếng Intelllisync.</p>\r\n<p>RIM 957 với màn hình to, chíp 32-bit Intel 386, 5Mb bộ nhớ. 957 cũng có thể dùng như là một Modem không dây để vào internet.</p>\r\n<p><strong>3. BlackBerry 5810 - Chiếc BlackBerry đầu tiên có chức năng thoại:</strong></p>\r\n<p style="text-align: center;"><img src="images/news/0610/blackberry-5810.jpg" border="0" /></p>\r\n<p>Tháng 3 năm 2002, RIM lần đầu tiên giới thiệu BlackBerry có tính năng thoại - tuy vẫn phải dùng tai nghe mới đàm thoại được, không có loa và micro trên máy - hỗ trợ mạng GSM/GPRS. Cùng với tính năng email, web tuyệt vời từ các dòng khác 5810 là chiếc BlackBerry trang bị mạnh nhất ở thời của nó và đây cũng là một chuyển biến tích cực nhất trong lịch sửa của RIM, đó là việc tham gia vào thị trường điện thoại thông minh.</p>\r\n<p>5810 mang trong mình những tính năng mà gần như giống hầu hết các chiếc BlackBerry hiện nay như: Điện thoại, email không dây, SMS, duyệt Web, lưu thông tin cá nhân, hệ đều hành J2ME, BlackBerry Enterprise Service - Hỗ trợ cả MS Outlook và Lotus Note - và the BlackBerry Web Client.</p>\r\n<p><strong>4. 6710 - Chiếc điện thoại hoàn chỉnh:</strong></p>\r\n<p style="text-align: center;"><img src="images/news/0610/blackberry-6710.jpg" border="0" /></p>\r\n<p>6710, có thể lác đác đâu đó bạn gặp chiếc điện thoại này ở thị trường Việt Nam. Ra đời tháng 7 năm 2002, BlackBerry 6710 là chiếc điện thoại thực sự nhất cùa BlackBerry. Hệ thống nổi bật về tin nhắn, mail, web... vẫn được giữ và bây giờ có cả loa và micro giúp cho việc đàm thoại đơn giản hơn. Kế đó 6710 hỗ trợ băng tần 900/1900 MHz, đây là băng tần phổ biến từ Châu Âu, Bắc Mỹ cho đến Châu Á Thái Bình Dương. Về thiết kế thì 6710 cũng được xem là sáng giá nhất thời đó của BlackBerry.</p>\r\n<p>Về phần cứng 6710 có bàn phím và màn hình với đèn ở dưới, bộ nhớ gồm 1Mb SRAM và 8Mb Flash. Về phần mềm thì 6710 nổi bật hơn so với các dòng trước là được cài thêm 1 ứng dụng mail chạy trên nền web hỗ trợ nhiều chuẩn mail khác nhau, giúp cho những người không dùng mail chuyên dụng của BlackBerry có thể dùng 6710 để gửi và nhận mail.</p>\r\n<p><strong>5.  6210 - Nhỏ hơn, đẹp hơn và mạnh hơn:</strong></p>\r\n<p style="text-align: center;"><img src="images/news/0610/blackberry-6210.jpg" border="0" /></p>\r\n<p>Với thiết kế nhỏ hơn, vỏ màu xanh và cấu hình mạnh hơn. 6210 cho cảm giác hoàn toàn mới của người dùng với BlackBerry, không đơn thuần là những "cục gạch" thông minh nữa.</p>\r\n<p>6210 với 2Mb SRAM và 16Mb Flash, ngoài việc hỗ trợ sms, điện thoại, email, duyệt web, tổ chức thông tin cá nhân, ứng dụng cài thêm, BES, web mail...thì trình mail của 6210 hỗ trợ tốt hơn việc đồng bộ hoá mail với máy tính qua MS Outlook, Lotus Note. Hỗ trợ tập tin đính kèm, và đọc tốt: Words, Excel, PowerPoint, PDF...</p>\r\n<p><strong>6. 6230 - Vòng quanh thế giới với màn hình màu:</strong></p>\r\n<p style="text-align: center;"><img src="images/news/0610/blackberry-6230.jpg" border="0" /></p>\r\n<p>6320 là chiếc BlackBerry đầu tiên với màn hình màu và hỗ trợ mang 3 băng tần: 900/1800/1900 MHz GSM/GPRS. Với 399,99usd, doanh nhân nào cũng có thể thực hiện cuộc gọi và nhận email ở hơn 100 quốc gia trên thế giới.</p>\r\n<p>Với 6230 RIM đã không chỉ còn hướng đến khách hàng khối doanh nghiệp mà còn đến cả các khách hàng cá nhân muốn sở hữu một thiết bị đa năng với bàn phím QWERTY. So với các máy màn hình đơn sắc trước đây thì 6320 với màn hình màu và độ phân giải cao thực sự là một điểm nhấn trong quá trình 10 năm của BlackBerry. Và về ứng dụng thì 6320 ngoài các tính năng nổi bật mà các dòng trước đã có thì còn có ứng dụng mail từ các nhà cung cấp dịch vụ ISP cũng chạy tốt.</p>\r\n<p><strong>7. 7100 - Bàn phím Suretype, 1/2 QWERTY xuất hiện:</strong></p>\r\n<p style="text-align: center;"><img src="images/news/0610/blackberry-7100.jpg" border="0" /></p>\r\n<p>Một lần nữa RIM muốn nhấn mạnh đến nhóm khách hàng cá nhân khi giới thiệu chiếc BlackBerry đầu tiên với bàn phím 1/2 QWERTY và công nghệ Suretype. Với công nghệ này các máy BlackBerry có bàn phím 1/2 QWERTY trở nên dễ dàng hơn trong nhập liệu. Máy sẽ tự động học thuộc các từ người dùng nhập và đưa ra gợi ý mỗi khi người dùng nhập các ký tự đầu của từ này.</p>\r\n<p>7100 cũng là chiếc BlackBerry nhỏ nhẹ và rẻ nhất trong các dòng BlackBerry từng được giới thiệu, giá lúc giới thiệu là 199usd. Với kích thước nhỏ và nhẹ hơn nhiều 7100 có thể dễ dàng bỏ vào túi quần, túi áo mà không gây cảm giác khó chịu. 7100 hỗ trợ mạng 4 băng tầng, hoạt động tốt ở 135 quốc gia trên toàn thế giới. Màn hình và màu cũng được cải tiến đáng kể về độ phân giải và sắc màu. 7100 còn được trang bị Bluetooth dùng với các tai nghe Bluetooth trên thị trường.</p>\r\n<p><strong>8. 8700 - Sức mạnh trong tầm tay:</strong></p>\r\n<p style="text-align: center;"><img src="images/news/0610/blackberry-8700.jpg" border="0" /></p>\r\n<p>RIM giới thiệu BlackBerry 8700 với hàng loại các tính năng nổi bật cuối năm 2005 khiến 8700 trở thành chiếc BlackBerry thành công nhất trong 10 năm qua. 8700 hỗ trợ EDGE, chuẩn kết nối không dây tốc độ cao tại điểm nó xuât hiện, nhanh hơn nhiều so với GPRS mà chúng đang dùng hiện nay. Hiện các mạng di động của Việt Nam cũng đang triển khai chứ chưa hoàn toàn cung cấp EDGE, có thể họ sẽ lên thẳng 3G.</p>\r\n<p>8700 với màn hình độ phân giải cao (320x240), 65 ngàn màu. Đèn màn hình và bàn phím tự động điều chỉnh ánh sáng cho phù hợp với môi trường xung quanh thông qua một cảm biến ánh sáng. 8700 cũng là chiếc BlackBerry đầu tiên trang bị vi xử lý Intel PXA901 tốc độ 312MHz. Hiện RIM vẫn giới thiệu các bản ROM mới cho 8700, bản ROM 4.5 chạy trên 8700 rất mượt và ổn định, phần nào nhờ vào cấu hình cao của nó.<strong> </strong></p>\r\n<p><strong>9. Pearl xuất hiện: Chào mừng bạn đến với thế giới Multimedia:</strong></p>\r\n<p style="text-align: center;"><img src="images/news/0610/blackberry-8100.jpg" border="0" /></p>\r\n<p>Cải tiến, cải tiến, thay đổi... nhưng vẫn giữ được phong cách đó là những gì mà RIM luôn giữ được trong suất chặng đường 10 năm của mình. Cứ qua mỗi lần giới thiệu sản phẩm mới là ta lại thấy cái mới. Pearl cho ta thấy điều đó. Tạm biệt bánh xe quen thuộc RIM mang đến cho ta viên ngọc và bây giờ nó là tiêu chuẩn cho mọi chiếc BlackBerry được giới thiệu. Và viên ngọc này cũng đã là cảm hứng cho hãng điện thoại khác.</p>\r\n<p>Pearl có gì mới: Màn hình đẹp hơn, hỗ trợ Multimedia đầy đủ, hỗ trợ thẻ nhớ, camera 1.3... phải hơn 50% những gì có trên Pearl là những cái hoàn toàn mới trong thế giới BlackBerry. Người dùng cá nhân đã chào đón Pearl nồng nhiệt, hết sức nồng nhiệt để đến tận hôm nay các model tiếp theo của Pearl vẫn được giới thiệu: 8120, 8110, 8130.Cảm biến ánh sáng thông minh cùng với màn hình cực sáng giúp màn hình 8100 sáng rực dưới ánh nắng 12 giờ trưa, nơi mà các điện thoại khác không thể nhìn thấy số.</p>\r\n<p>BlackBerry 8100 dĩ nhiên vẫn được trang bị công nghệ Suretype từ 7100, hỗ trợ nhạc MP3, ACC, Video... Với thiết kế bóng bảy sang trọng, bạn khó mà có thể chê được 8100 điểm nào.</p>\r\n<p><strong>10. 8800 - Doanh nhân hiện đại:</strong></p>\r\n<p style="text-align: center;"><img src="images/news/0610/blackberry-8800.jpg" border="0" /></p>\r\n<p>Được phát triển và giới thiệu sau 8100 vài tháng, BlackBerry 8800 được xem là chiếc điện thoại cho những doanh nhân đích thực. 8800 được RIM quảng cáo như là một chiếc BlackBerry đầy sức mạnh. Bàn phím QWERTY, tích hợp GPS, thẻ nhớ... Với màu đen và xanh đen khi giới thiệu cũng như việc không tích hợp Camera 8800 làm hài lòng những người vẫn xem BlackBerry là của các doanh nhân dích thực, Camera chỉ là trò đùa.</p>\r\n<p>Dòng 8800 sau này còn ra một phiên bản đặc biệt hỗ trợ 2 hệ thống mạng GSM và CDMA. Bạn thực sự được luôn luôn kết nối cho dù bạn đang ở bất cứ nói đâu trên thế giới.</p>\r\n<p><strong>11. Curve 8300 - Full QWERTY:</strong></p>\r\n<p style="text-align: center;"><img src="images/news/0610/blackberry-8300.jpg" border="0" /></p>\r\n<p>Cũng được giới thiệu sau 8100 vài tháng, 8300 hay còn gọi là Curve trở thành chiếc BlackBerry có bàn phím QWERTY nhỏ nhất, nhẹ nhất. Curve chia sẻ các tính năng nổi bật và thời trang của 8100 với bàn phím QWERTY. Curve cũng là chiếc BlackBerry đầu tiên có lỗ cắm tai nghe theo tiêu chuẩn 3,5ly, đây là chuẩn tai nghe phổ biến nhất, thích hợp với những tai nghe chất lượng cao đang có trên thị trường.</p>\r\n<p>Giống như Pearl, Curve được đón nhận hết sức nồng nhiệt, đặc biệt là từ các khách hàng mà từ trước đến giờ không quan tâm đến BlackBerry.</p>\r\n<p><strong>12. BOLD - BlackBerry trang bị tận răng:</strong></p>\r\n<p style="text-align: center;"><img src="images/news/0610/blackberry-9000.jpg" border="0" /></p>\r\n<p>Đúng như cái tên của mình, nhìn Bold thật đập đà và mạnh mẽ. Và bên trong cũng thế, Bold là chiếc BlackBerry được trang bị mạnh nhất từ trước đến nay: GPS, Wifi, bộ nhớn trong 1Gb, màn hình độ phân giải cao hơn, đep hơn... Tại thị trường Việt Nam kể từ khi BlackBerry xuất cách đây vài năm thì Bold được mong đợi hơn hết. Giá chào bán của Bold đắt gấp đôi giá chào bán của các chiếc BlackBerry khác khi mới giới thiệu. Có lẽ sau đợi cải cách mạnh mẽ ở BlackBerry 8700 về sức mạnh của BlackBerry thì Bold là một điểm nhấn khác.</p>\r\n<p>Trải nghiệm thực tế với Bold cho thấy BlackBerry không là thiết bị nghèo giải trí đang phương tiện như mọi người thường nghĩ. Khả năng thực thi âm thanh, hình ảnh, video của Bold khiến các điện thoại thông minh khác phải ngỡ ngàng. Màn hình Bold đẹp rực rỡ, hệ điều hành chạy nhanh và ổn định.</p>\r\n<p>Những model tiếp nối sau này như Javelin 8900, Tour 9650, Bold 2 9700, Storm 9500 với màn hình cảm ứng đầu tiên, 9100 series kế thừa dòng Pearl nổi tiếng vẫn đưọc sự đón nhận nồng nhiệt của giới yêu công nghệ khắp nơi trên thế giới. BlackBerry ngày càng tiếng xa hơn, nhanh hơn và là đối thủ đáng gờm của các hãng điện thoại khác.</p>\r\n<p style="text-align: right;"><strong>BlackBerry Sài Gòn</strong> (Tổng hợp)</p>', 1, 1, 0, 5, '2010-07-01 15:24:02', 62, '', '2010-07-03 14:11:41', 62, 0, '0000-00-00 00:00:00', '2010-07-01 15:24:02', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 20, 0, 1, 'RIM', '', 0, 162, 'robots=\nauthor='),
(2, 'Hỏi đáp', 'hoi-dap', '', '<p><img src="images/bbs/faq.jpg" border="0" /></p>\r\n<p><span style="color: #5b5b5b;"><span style="padding: 0px; margin: 0px; line-height: 16px; font-weight: bold;">Mua hàng tại BlackBerry Sài Gòn</span><span style="padding: 0px; margin: 0px; line-height: 16px; font-weight: bold;"> tôi sẽ nhận  được gì đặc biệt hơn so với những nơi khác?</span><span style="padding: 0px; margin: 0px;"><br /></span></span></p>\r\n<p><span style="color: #5b5b5b;"><span style="padding: 0px; margin: 0px;">Khi bạn mua  hàng tại BBsaigon.com</span> bạn được sở hữu những sản  phẩm chất lượng với giá tốt hơn những nơi khác, bạn sẽ nhận được sự tư  vấn nhiệt tình, chăm sóc khách hàng chu đáo. <span style="padding: 0px; margin: 0px;">BBsaigon.com thường xuyên có những  chương trình khuyến mãi, bạn có thể mua những những sản phẩm với giá rẻ  không ngờ hoặc kèm những tặng phẩm giá trị.<br /><br /></span></span></p>\r\n<p><span style="color: #5b5b5b;"><span style="padding: 0px; margin: 0px; line-height: 16px; font-weight: bold;">BlackBerry Sài Gòn</span></span><span style="color: #5b5b5b;"><span style="padding: 0px; margin: 0px; line-height: 16px;"><span style="padding: 0px; margin: 0px;"><strong style="padding: 0px; margin: 0px;"></strong></span><span style="padding: 0px; margin: 0px;"><strong style="padding: 0px; margin: 0px;"> có thường xuyên đưa ra các chương  trình khuyến mãi không?</strong></span></span></span></p>\r\n<p><span style="color: #5b5b5b;"><span style="padding: 0px; margin: 0px; line-height: 16px;"><span style="padding: 0px; margin: 0px;">Công ty thường xuyên có những chương trình  khuyến mãi như: Giảm giá, tặng sản phẩm đi kèm, đặc biệt là  BBsaigon.com có một chương trình giảm giá cực hấp dẫn đó là giảm giá một  số mặt hàng với số lượng có hạn, ưu tiên cho những khách hàng đến  trước…<br /><br /></span></span></span></p>\r\n<p><span style="color: #5b5b5b;"><span style="padding: 0px; margin: 0px; line-height: 16px;"><span style="padding: 0px; margin: 0px;"><strong style="padding: 0px; margin: 0px;">Nếu  không vào website </strong></span></span></span><span style="color: #5b5b5b;"><span style="padding: 0px; margin: 0px; line-height: 16px; font-weight: bold;">của BlackBerry Sài Gòn</span></span><span style="color: #5b5b5b;"><span style="padding: 0px; margin: 0px; line-height: 16px;"><span style="padding: 0px; margin: 0px;"><strong style="padding: 0px; margin: 0px;"></strong></span><span style="padding: 0px; margin: 0px;"><strong style="padding: 0px; margin: 0px;"></strong></span><span style="padding: 0px; margin: 0px;"><strong style="padding: 0px; margin: 0px;"> thì làm sao có thể biết những chương  trình khuyến mãi hay không</strong></span><span style="padding: 0px; margin: 0px;"><strong style="padding: 0px; margin: 0px;"></strong></span><span style="padding: 0px; margin: 0px;"><strong style="padding: 0px; margin: 0px;">?</strong></span></span></span></p>\r\n<p><span style="color: #5b5b5b;"><span style="padding: 0px; margin: 0px; line-height: 16px;"><span style="padding: 0px; margin: 0px;">Bạn có thể đăng ký ở mục: “<em style="padding: 0px; margin: 0px;">Hãy nhập Email của bạn để nhận được  những thông tin khuyến mãi mới nhất "</em> phía dưới cùng của website,  khi có chương trình khuyến mãi thì hệ thống sẽ tự động gởi mail thông  báo cho bạn.<br /><br /></span></span></span></p>\r\n<p><span style="color: #5b5b5b;"><span style="padding: 0px; margin: 0px; line-height: 16px; font-weight: bold;">BlackBerry Sài Gòn </span></span><span style="color: #5b5b5b;"><span style="padding: 0px; margin: 0px; line-height: 16px;"><span style="padding: 0px; margin: 0px;"><strong style="padding: 0px; margin: 0px;"></strong></span><span style="padding: 0px; margin: 0px;"><strong style="padding: 0px; margin: 0px;">có chấp nhận thanh  toán bằng hình thức Master Card hay Visa Card không?</strong></span></span></span></p>\r\n<p><span style="color: #5b5b5b;"><span style="padding: 0px; margin: 0px; line-height: 16px;"><span style="padding: 0px; margin: 0px;">Hiện nay tại công ty của chúng tôi chưa có  nhận hình thức thanh toán bằng Master Card và Visa Card. Hi vọng sẽ chấp  nhận hình thức thanh toán này trong thời gian sớm nhất.<br /><br /></span></span></span></p>\r\n<p><span style="color: #5b5b5b;"><span style="padding: 0px; margin: 0px; line-height: 16px;"><span style="padding: 0px; margin: 0px;"><strong style="padding: 0px; margin: 0px;">Đường  dây nóng nào mà tôi có thể liên lạc nhanh nhất và tiện lợi nhất trong  trường hợp có những thắc mắc cần tư vấn ?</strong></span></span></span></p>\r\n<p><span style="color: #5b5b5b;"><span style="padding: 0px; margin: 0px; line-height: 16px;">Mọi thắc mắc bạn vui lòng gọi đến  số <strong>0903.183.183</strong>, chúng tôi sẽ trả lời chi tiết nhất cho bạn.</span></span></p>', '', 1, 0, 0, 0, '2009-08-28 12:44:07', 62, '', '2010-07-07 12:15:09', 62, 0, '0000-00-00 00:00:00', '2009-08-28 12:44:07', '0000-00-00 00:00:00', '', '', 'show_title=0\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=0\nshow_create_date=0\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 12, 0, 3, '', '', 0, 699, 'robots=\nauthor='),
(3, 'Giới thiệu', 'gioi-thieu', '', '<p>Các website mới ra đời ngày càng nhiều, giúp người dùng ngày càng có nhiều “món ngon” hơn trong thực đơn lướt net mỗi ngày của mình.</p>\r\n<p>Trong đó, Bibishop là 1 trong số những hệ thống website của Wamp mà bạn không thể bỏ qua. Bibishop website về lĩnh vực thời trang, một trong những lĩnh vực luôn là đối tượng thu hút sự quan tâm của mọi người nhất là giới trẻ.</p>\r\n<p>Bibishop chúng tôi mang xu hướng thời trang hiện đại, sự sáng tạo độc đáo, sự kết hợp hài hòa  tinh hoa thời trang thế giới và phong cách truyền thống Á đông tạo nên một nét đẹp dịu dàng mà mạnh mẽ trên mỗi trang phục cho mọi lứa tuổi từ những thương hiệu nổi tiếng với chất lượng cao.. Các bạn sẽ hài lòng để có thể lựa chọn Bibishop là điểm mua sắm cho bạn và gia đình.</p>\r\n<p> </p>\r\n<p style="text-align: center;"><strong>Chúng tôi luôn cam kết phục vụ quý vị khách hàng với phương châm</strong></p>\r\n<p style="text-align: center;"><strong> Uy Tín – Chất lượng – thân thiện</strong></p>', '', 1, 0, 0, 0, '2009-08-28 12:55:36', 62, '', '2010-10-11 07:58:11', 82, 0, '0000-00-00 00:00:00', '2009-08-28 12:55:36', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=0\nshow_create_date=1\nshow_modify_date=\nshow_pdf_icon=0\nshow_print_icon=0\nshow_email_icon=0\nlanguage=\nkeyref=\nreadmore=', 41, 0, 2, '', '', 0, 1378, 'robots=\nauthor='),
(58, 'Điều khoản sử dụng', 'dieu-khoan-su-dung', '', '<p><img src="images/bbs/dieukhoansudung.jpg" border="0" /></p>\r\n<p><span style="font-family: arial,helvetica,sans-serif;">BlackBerry Sài Gòn | BBSaigon.com là website thông tin, mua bán, giới thiệu điện thoại BlackBerry, phụ kiện, hàng công nghệ... do Công ty TNHH Khoa Nguyễn phát triển và giữ bản quyền. Xin vui lòng lưu ý những quy định dưới đây trước khi sử dụng:</span></p>\r\n<p><span style="font-family: arial,helvetica,sans-serif;">+ Tất cả những thông tin trên trang web này được cung cấp, cập nhật và phát triển bởi bởi Công ty TNHH Khoa Nguyễn, được coi như một nơi để tra cứu, tham khảo, tìm hiểu và định hướng thông tin trước khi bạn quyết định mua sản phẩm.</span> <span style="font-family: arial,helvetica,sans-serif;"><br /><br /> + Chúng tôi cập nhật thông tin dựa vào các website, các nguồn tin, các thông cáo báo chí của các hãng danh tiếng. Chúng tôi cũng có tham khảo từ những website công nghệ và thông tin nổi tiếng và uy tín trên thế giới. </span></p>\r\n<p><span style="font-family: arial,helvetica,sans-serif;">+ Tuy nhiên, chúng tôi vẫn không đảm bảo rằng những thông tin mà chúng tôi cung cấp tại website này là chính xác 100%. Vì vậy, chúng tôi không chịu trách nhiệm về tính pháp lý mà nguyên do từ những thông tin trên website này mang đến những sự rắc rối cho Quý khách.</span></p>\r\n<p><span style="font-family: arial,helvetica,sans-serif;">+ Chúng tôi cam kết sẽ đem đến những thông tin và thông số chính xác nhất đến cao nhất, những hình ảnh đẹp nhất, những video clips sinh động nhất để Quý khách có được một nơi yên tâm tra cứu về sản phẩm BlackBerry.</span></p>\r\n<p><span style="font-family: arial,helvetica,sans-serif;">+ Chúng tôi rất trân trọng mọi đóng góp ý kiến, cũng như những phát hiện sai sót tại website này mà trong quá trình cập nhật chúng tôi dù cố gắng nhưng vẫn không tránh khỏi. Chúng tôi sẽ cập nhật chỉnh sửa nội dung liên tục để thông tin luôn được hoàn thiện và chính xác nhất.</span></p>\r\n<p><span style="font-family: arial,helvetica,sans-serif;">+ Biểu trưng tên miền website BBSaigon.com, logo BlackBerry Sài Gòn | BBSaigon.com đăng trên website là sở hữu của Công ty TNHH Khoa Nguyễn, đã được đăng ký bản quyền thương hiệu và không được sử dụng lại với bất kỳ hình thức nào.</span></p>\r\n<p><span style="font-family: arial,helvetica,sans-serif;">+ Xin lưu ý: Vui lòng ghi rõ nguồn tin BlackBerry Sài Gòn hay BBSaigon.com khi bạn phát hành lại nội dung từ website này.</span></p>\r\n<p style="text-align: right;"><span style="font-family: arial,helvetica,sans-serif;"><strong>Trân tr</strong></span><span style="font-family: arial,helvetica,sans-serif;"><strong>ọ</strong><strong>ng c</strong><strong>ả</strong><strong>m </strong><strong>ơ</strong><strong>n!</strong></span></p>', '', 1, 0, 0, 0, '2010-05-25 04:14:41', 62, '', '2010-07-08 09:29:35', 62, 0, '0000-00-00 00:00:00', '2010-05-25 04:14:41', '0000-00-00 00:00:00', '', '', 'show_title=0\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=0\nshow_modify_date=0\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 12, 0, 5, '', '', 0, 67, 'robots=\nauthor='),
(59, 'RIM ra mắt BlackBerry Bold 9650 và Pearl 3G', 'rim-ra-mat-blackberry-bold-9650-va-pearl-3g', '', '<p><span style="color: #5b5b5b;"><strong>RIM  giới thiệu bộ đôi BlackBerry mới là Bold 9650 và  Pearl  3G với thiết  kế bàn phím QWERTY truyền thống.</strong></span></p>\r\n<p><span style="color: #5b5b5b;">Cả  hai không mang kiểu dáng khác lạ so với trước các <span id="cpms_link0" onclick="cpms_Intext.aj(0);" onmouseover="cpms_Intext.f(0);" onmouseout="cpms_Intext.Z();">điện thoại</span> BlackBerry mới trước  đây,  mà chỉ xem là các bản nâng cấp của sản phẩm  đi trước. \r\n', '\r\n</span></p>\r\n<p style="text-align: center;"><span style="color: #5b5b5b;"><img src="images/news/0610/bb-bold-9630.jpg" border="0" /><br /><span style="color: #888888;">BlackBerry   Bold 9650 là bản nâng cấp của dòng Bold trước</span></span></p>\r\n<p><span style="color: #5b5b5b;">Theo  cấu hình ban đầu mà RIM công bố, BlackBerry Bold 9650 có kiểu dáng dạng    thanh, camera 3,2 Megapixel, màn hình được mô tả là có độ nét cao.   Model  này tích hợp GPS và Wi-Fi chuẩn b/g. Thiết bị chạy đồng thời trên   mạng  GSM/UTMS lẫn CDMA.</span></p>\r\n<p style="text-align: center;"><span style="color: #5b5b5b;"><img src="images/news/0610/bb-pearl-3g.jpg" border="0" /><br /><span style="color: #888888;">BlackBerry  Pearl 3G có 2 loại bàn phím</span><br /></span></p>\r\n<p><span style="color: #5b5b5b;">BlackBerry  Pearl 3G là chiếc di động chạy trên mạng GSM, hỗ trợ kết nối 3G, máy  cũng có màn   hình độ phân giải cao, camera 3,2 Megapixel và GPS. Đặc  biệt, thiết bị   hỗ trợ Wi-Fi chuẩn b/g/n.</span></p>\r\n<p><span style="color: #5b5b5b;">Cả  hai model mới của RIM đều sử dụng trackpad giống  như nhiều model  gần  đây. Bold 9650 sẽ có mặt vào tháng tới trên mạng  Sprint của Mỹ,  trong  khi Pearl 4G sẽ xuất hiện tại Canada. Hiện chưa có  thông tin về  mức  giá.</span></p>\r\n<p style="text-align: right;">Nguồn tin: <strong>Số  Hóa</strong></p>', 1, 1, 0, 5, '2010-06-08 13:59:13', 62, '', '2010-06-30 19:21:29', 62, 0, '0000-00-00 00:00:00', '2010-06-08 13:59:13', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 14, 0, 10, 'Bold 9650, Pearl 3g', '', 0, 153, 'robots=\nauthor=');
INSERT INTO `hdt_content` (`id`, `title`, `alias`, `title_alias`, `introtext`, `fulltext`, `state`, `sectionid`, `mask`, `catid`, `created`, `created_by`, `created_by_alias`, `modified`, `modified_by`, `checked_out`, `checked_out_time`, `publish_up`, `publish_down`, `images`, `urls`, `attribs`, `version`, `parentid`, `ordering`, `metakey`, `metadesc`, `access`, `hits`, `metadata`) VALUES
(60, 'BlackBerry Pearl 3G nhỏ gọn', 'blackberry-pearl-3g-nho-gon', '', '<p><strong>Pearl 3G là chiếc BlackBerry đầu tiên của RIM hỗ trợ  Wi-Fi chuẩn n, máy có thiết kế nhỏ gọn</strong><br /><span style="text-decoration: underline;"><a href="http://sohoa.vnexpress.net/SH/Dien-thoai/Smartphone/2010/04/3B9B22A1/"></a></span></p>\r\n<p>BlackBerry Pearl 3G là mẫu di động mới nhất trong dòng  Pearl của RIM vừa được hãng trình làng tuần trước cùng Bold 9650.</p>\r\n', '\r\n<p>Vẫn  giữ bàn phím một nửa QWERTY so với trước đây, nhưng viên bi điều khiển  được thay bằng trackpad giống các mẫu BlackBerry mới.</p>\r\n<p style="text-align: left;">Thiết bị hỗ trợ kết nối 3G, GPS, đặc biệt Wi-Fi chuẩn  b/g/n. Máy có camera 3,2 Megapixel. Dưới đây là loạt hình ảnh thực tế  model này.</p>\r\n<p style="text-align: center;"><img class="border_img" src="images/news/0610/blackberry-pearl-3g-1.jpg" border="0" /><br /><span style="color: #888888;">Máy có kích thước 108 x 50 x 13,3 mm, nặng 93,6 gram, là một trong những  chiếc<br />BlackBerry nhỏ gọn nhất hiện nay</span></p>\r\n<p style="text-align: center;"><img class="border_img" src="images/news/0610/blackberry-pearl-3g-2.jpg" border="0" /><br /><span style="color: #888888;">Màn hình của máy có độ phân giải 360 x 400 pixel, 256 nghìn màu. Model  này vẫn chạy trên<br />hệ điều hành cũ, và có thể được nâng cấp lên 6.0 khi  RIM đưa nền tảng này ra thị trường</span></p>\r\n<p style="text-align: center;"><img class="border_img" src="images/news/0610/blackberry-pearl-3g-3.jpg" border="0" /><br /><span style="color: #888888;">Pearl 3G sẽ có hai phiên bản, trong khi 9100 có bàn phím một nửa  QWERTY...</span></p>\r\n<p style="text-align: center;"><img class="border_img" src="images/news/0610/blackberry-pearl-3g-4.jpg" border="0" /><br /><span style="color: #888888;">... thì 9105 lại có kiểu bàn phím số bình thường</span></p>\r\n<p style="text-align: center;"><img class="border_img" src="images/news/0610/blackberry-pearl-3g-5.jpg" border="0" /></p>\r\n<p style="text-align: center;"><img class="border_img" src="images/news/0610/blackberry-pearl-3g-6.jpg" border="0" /><br /><span style="color: #888888;">Nhìn từ các cạnh của máy</span></p>\r\n<p style="text-align: center;"><img class="border_img" src="images/news/0610/blackberry-pearl-3g-7.jpg" border="0" /><br /><span style="color: #888888;">Mặt sau với camera 3,2 Megapixel, đèn flash LED.</span></p>\r\n<p style="text-align: center;"><img class="border_img" src="images/news/0610/blackberry-pearl-3g-8.jpg" border="0" /><br /><span style="color: #888888;">Model này hỗ trợ mạnh mẽ về kết nối</span></p>\r\n<p style="text-align: center;"><img class="border_img" src="images/news/0610/blackberry-pearl-3g-9.jpg" border="0" /><br /><span style="color: #888888;">So sánh hai phiên bản 9100 và 9105...</span></p>\r\n<p style="text-align: right;"><img class="border_img" src="images/news/0610/blackberry-pearl-3g-10.jpg" border="0" /><span style="color: #888888;"><br />... với hai phong cách bàn phím khác nhau, tuy nhiên tính năng và cấu  hình thì tươn</span><span style="color: #888888;">g tự</span></p>\r\n<p style="text-align: right;">Ảnh: <strong>Electricpig</strong></p>', 1, 1, 0, 5, '2010-06-08 14:45:28', 62, '', '2010-06-30 19:26:44', 62, 0, '0000-00-00 00:00:00', '2010-06-08 14:45:28', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 19, 0, 9, 'Pearl 3G', '', 0, 106, 'robots=\nauthor='),
(62, 'RIM thay thế Motorola trong top 5', 'rim-thay-the-motorola-trong-top-5', '', '<p><strong>Với 10,6 triệu smartphone bán ra trong quý I/2010, RIM BlackBerry đã  vượt Motorola và cùng Sony Ericsson xếp thứ 4 trong top 5 nhà sản xuất  di động hàng đầu.  \r\n', '\r\n</strong></p>\r\n<p style="text-align: center;"><img class="border_img" src="images/news/0610/rim.jpg" border="0" /><br /><span style="color: #888888;">RIM là một trong 5 nhà sản xuất di động lớn nhất thế giới. Ảnh: Daylife</span></p>\r\n<p>Thị trường di động toàn cầu đã tăng tới 21% trong quý  I/2010, đây được xem là mức hồi phục mạnh mẽ so với thời điểm quý  I/2009. Kết quả này có được nhờ smartphone bán ra tăng và kinh thế thế  giới đang phục hồi. Theo <em>IDC</em>, các nhà sản xuất đã bán ra 294,9  triệu chiếc di động trong quý đầu tiên năm nay, so với 242,4 triệu của  năm ngoái.</p>\r\n<p>Sự phát triển của smartphone đã dẫn tới những thay đổi  lớn. Đáng chú ý, Research In Motion (RIM) đã tiến vào top 5 nhà sản  xuất di động lớn nhất thế giới, thay thế Motorola và xếp cùng vị trị thứ  4 với Sony Ericsson.</p>\r\n<p>Tổng cộng, trong quý RIM đã đưa ra 10,6 triệu chiếc  smartphone, trong khi Motorola chỉ tiêu thụ được 8,5 triệu model. "Việc  RIM lọt top 5 không chỉ cho thấy smartphone tăng trưởng mạnh, mà còn là  dấu hiệu của thị trường di động hồi phục", Kevin Restivo, nhà phân tích  cao cấp của <em>IDC</em> nhận định.</p>\r\n<p>Chìa khóa cho sự thành công của RIM là các model như  BlackBerry Curve 8520 và Bold 9700.</p>\r\n<p style="text-align: center;"><img class="border_img" src="images/news/0610/smart-phones.jpg" border="0" /><br /><span style="color: #999999;">Sự phát triển của smartphones đã đưa thị trường di động tăng trưởng. Ảnh: Reuters</span></p>\r\n<p>Nokia vẫn là nhà sản xuất có lượng di động bán ra cao  nhất thế giới. Với các model bán ra tốt như 5130, 2700, hãng đã tiêu thụ  được 107,8 triệu máy, tăng 16% so với thời điểm này năm ngoái. Trong  quý, các mẫu smartphone bán chạy của Nokia gồm có 5230, 5800, 5530, và  X6. Tuy nhiên, giá trung bình một chiếc di động của hãng giảm xuống còn  155 euro so với 186 euro của quý trước đó. Trong thời gian tới, hãng sẽ  đưa ra thị trường siêu phẩm N8, model đầu tiên chạy trên nền tảng  Symbian^3 với giá khoảng 500 USD.</p>\r\n<p>Samsung tiếp tục giữa được sự tăng trưởng và đứng ở vị  trí số hai với 64 triệu chiếc di động bán ra, chiếm thị phần hơn 21%.  Đây là một trong những tên tuổi nhiệt tình với xu hướng sản xuất di động  hội tụ với màn hình cảm ứng, nhiều kết nối. Trong quý II, hãng sẽ đưa  ra thị trường model chạy Bada đầu tiên.</p>\r\n<p>LG đã bán ra số di động tăng gần 20% so với cùng thời  gian này năm ngoái, tuy nhiên doanh thu và lợi nhuận lại giảm. Di động  của hãng bán ra phần lớn là các model giá rẻ, một số kết hợp với các nhà  mạng. Trong quý tới, LG sẽ tiếp tục trình làng các mẫu smartphone chạy  Android, Windows Mobile 6.5, di động chạy Windows Phone 7 của LG sẽ xuất  hiện cuối năm.</p>\r\n<p><em>Dưới đây là bảng tổng kết tình hình kinh doanh của  các nhà sản xuất lớn trong quý I/2010 của IDC.</em></p>\r\n<table border="1" cellspacing="2" cellpadding="2" bgcolor="#efefef">\r\n<tbody style="text-align: left;">\r\n<tr style="text-align: left;">\r\n<td style="text-align: left;" width="111" valign="top"><strong>Nhà  sản xuất</strong></td>\r\n<td style="text-align: right;" width="118" valign="top">\r\n<p style="text-align: center;"><strong>Lượng máy bán ra quý I/2010 (triệu máy)</strong></p>\r\n</td>\r\n<td style="text-align: right;" width="91" valign="top"><strong>Thị  phần quý I/2010</strong></td>\r\n<td style="text-align: right;" width="72" valign="top">\r\n<p style="text-align: center;"><strong>Lượng máy bán ra quý I/2009 (triệu máy)</strong></p>\r\n</td>\r\n<td style="text-align: right;" width="88" valign="top"><strong>Thị  phần quý I/2009</strong></td>\r\n<td style="text-align: right;" width="92" valign="top"><strong>Thay đổ<br /></strong></td>\r\n</tr>\r\n<tr style="text-align: left;">\r\n<td style="text-align: left;" width="111" valign="top"><strong>1.</strong> Nokia</td>\r\n<td style="text-align: right;" width="118" valign="top">107.8</td>\r\n<td style="text-align: right;" width="91" valign="top">36.6%</td>\r\n<td style="text-align: right;" width="72" valign="top">93.2</td>\r\n<td style="text-align: right;" width="88" valign="top">38.4%</td>\r\n<td style="text-align: right;" width="92" valign="top">15.7%</td>\r\n</tr>\r\n<tr style="text-align: left;">\r\n<td style="text-align: left;" width="111" valign="top"><strong>2.</strong> Samsung</td>\r\n<td style="text-align: right;" width="118" valign="top">64.3</td>\r\n<td style="text-align: right;" width="91" valign="top">21.8%</td>\r\n<td style="text-align: right;" width="72" valign="top">45.9</td>\r\n<td style="text-align: right;" width="88" valign="top">18.9%</td>\r\n<td style="text-align: right;" width="92" valign="top">40.1%</td>\r\n</tr>\r\n<tr style="text-align: left;">\r\n<td style="text-align: left;" width="111" valign="top"><strong>3.</strong> LG Electronics</td>\r\n<td style="text-align: right;" width="118" valign="top">27.1</td>\r\n<td style="text-align: right;" width="91" valign="top">9.2%</td>\r\n<td style="text-align: right;" width="72" valign="top">22.6</td>\r\n<td style="text-align: right;" width="88" valign="top">9.3%</td>\r\n<td style="text-align: right;" width="92" valign="top">19.9%</td>\r\n</tr>\r\n<tr style="text-align: left;">\r\n<td style="text-align: left;" width="111" valign="top"><strong>4.</strong> Research In Motion</td>\r\n<td style="text-align: right;" width="118" valign="top">10.6</td>\r\n<td style="text-align: right;" width="91" valign="top">3.6%</td>\r\n<td style="text-align: right;" width="72" valign="top">7.3</td>\r\n<td style="text-align: right;" width="88" valign="top">3.0%</td>\r\n<td style="text-align: right;" width="92" valign="top">45.2%</td>\r\n</tr>\r\n<tr style="text-align: left;">\r\n<td style="text-align: left;" width="111" valign="top"><strong>4.</strong> Sony Ericsson</td>\r\n<td style="text-align: right;" width="118" valign="top">10.5</td>\r\n<td style="text-align: right;" width="91" valign="top">3.6%</td>\r\n<td style="text-align: right;" width="72" valign="top">14.5</td>\r\n<td style="text-align: right;" width="88" valign="top">6.0%</td>\r\n<td style="text-align: right;" width="92" valign="top">-27.6%</td>\r\n</tr>\r\n<tr style="text-align: left;">\r\n<td style="text-align: left;" width="111" valign="top">Khác</td>\r\n<td style="text-align: right;" width="118" valign="top">74.6</td>\r\n<td style="text-align: right;" width="91" valign="top">25.3%</td>\r\n<td style="text-align: right;" width="72" valign="top">58.9</td>\r\n<td style="text-align: right;" width="88" valign="top">24.3%</td>\r\n<td style="text-align: right;" width="92" valign="top">26.7%</td>\r\n</tr>\r\n<tr style="text-align: left;">\r\n<td style="text-align: left;" width="111" valign="top">Tổng cộng<br /></td>\r\n<td style="text-align: right;" width="118" valign="top">294.9</td>\r\n<td style="text-align: right;" width="91" valign="top">100.0%</td>\r\n<td style="text-align: right;" width="72" valign="top">242.4</td>\r\n<td style="text-align: right;" width="88" valign="top">100.0%</td>\r\n<td style="text-align: right;" width="92" valign="top">21</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p style="text-align: right;">Nguồn tin<strong>: Số Hóa</strong></p>', 1, 1, 0, 5, '2010-06-08 15:55:26', 62, '', '2010-07-02 18:18:50', 62, 0, '0000-00-00 00:00:00', '2010-06-08 15:55:26', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 20, 0, 5, 'RIM', '', 0, 99, 'robots=\nauthor='),
(63, 'BlackBerry OS 6 qua ảnh', 'blackberry-os-6-qua-anh', '', '<p><strong>Giao diện đẹp, hỗ trợ sử dụng bằng ngón tay trên màn  hình cảm ứng đa điểm là các nâng cấp mới của hệ điều hành BlackBerry 6.</strong></p>\r\n', '\r\n<p>Tuần trước, tại sự kiện WES (diễn ra từ 27 đến 29/4  tại Mỹ), RIM đã công bố những hình ảnh ban đầu về hệ điều hành mới bằng  đoạn video ấn tượng. Tuy không có thêm chi tiết nào, nhưng với giao diện  và cách điều khiển mới, dễ nhận thấy BlackBerry OS 6 không chỉ là chiếc  di động cho phép quản lý e-mail, nhập liệu tốt, mà đây còn là thiết bị  hướng tới các tính năng giải trí đa phương tiện, xu hướng chung của  smartphone hiện nay.</p>\r\n<p>Dưới đây là những cái nhìn đầu tiên về BlackBerry OS 6  thông qua các hình ảnh chụp lại đoạn video mà RIM công bố.</p>\r\n<p style="text-align: center;"><img class="border_img" src="images/news/0610/blackberry-os-6-1.jpg" border="0" /><br /><span style="color: #888888;">Dễ nhận thấy, phiên bản 6 có nhiều nét kế thừa về giao diện so với OS 5,  nhưng RIM<br />đã làm mới bằng các giao diện đồ họa, một số biểu tượng được  vẽ lại</span></p>\r\n<p style="text-align: center;"><img class="border_img" src="images/news/0610/blackberry-os-6-2.jpg" border="0" /><br /><span style="color: #888888;">Màn hình Home được thiết kế lại, theo đó mọi điều khiển thông qua các  nút tắt, cho phép<br />vào nhanh tất cả các ứng dụng, chương trình yêu thích,  Media hay Download</span></p>\r\n<p style="text-align: center;"><img class="border_img" src="images/news/0610/blackberry-os-6-3.jpg" border="0" /><br /><span style="color: #888888;">Tìm kiếm Universal sẽ được mở rộng, giống như iPhone 4.0, không chỉ các  nội dung<br />trên di động, mà người dùng có thể mở tùy chọn sang web</span></p>\r\n<p style="text-align: center;"><img class="border_img" src="images/news/0610/blackberry-os-6-4.jpg" border="0" /><br /><span style="color: #999999;">RIM mới đây đã mua lại hãng trình duyệt Torch Mobile, công nghệ hãng này  nhanh<br />chóng được đưa vào BlackBerry 6 với trình duyệt trên nền WebKit,  cho phép<br />vào manh nhanh, mạnh mẽ và kinh nghiệm hơn</span></p>\r\n<p style="text-align: center;"><img class="border_img" src="images/news/0610/blackberry-os-6-5.jpg" border="0" /><br /><span style="color: #888888;">Đóng mở các tab trực quan</span></p>\r\n<p style="text-align: center;"><img class="border_img" src="images/news/0610/blackberry-os-6-6.jpg" border="0" /><br /><span style="color: #888888;"><span style="font-size: small;">Các ký tự trên menu trực quan, tương phản giữa màu đen nền và trắng của  ký tự</span></span></p>\r\n<p style="text-align: center;"><img class="border_img" src="images/news/0610/blackberry-os-6-7.jpg" border="0" /><br /><span style="color: #888888;">Một Menu ngữ cảnh cho thấy, các biểu tượng sẽ hiện lên phù hợp với công  việc,<br />chức năng đang chạy</span></p>\r\n<p style="text-align: center;"><img class="border_img" src="images/news/0610/blackberry-os-6-8.jpg" border="0" /><br /><span style="color: #888888;">Feeds, cập nhật các liên lạc từ Facebook, Twitter, RSS Google...</span></p>\r\n<p style="text-align: center;"><img class="border_img" src="images/news/0610/blackberry-os-6-9.jpg" border="0" /><br /><span style="color: #888888;">Chọn các kênh liên lạc để theo dõi</span></p>\r\n<p style="text-align: center;"><img class="border_img" src="images/news/0610/blackberry-os-6-10.jpg" border="0" /><br /><span style="color: #888888;">Cập nhật Twitter</span></p>\r\n<p style="text-align: center;"><img class="border_img" src="images/news/0610/blackberry-os-6-11.jpg" border="0" /><br /><span style="color: #888888;">Giao diện chơi nhạc cuốn hút không kém gì iPhone</span></p>\r\n<p style="text-align: center;"><img class="border_img" src="images/news/0610/blackberry-os-6-12.jpg" border="0" /><br /><span style="color: #888888;">Tìm kiếm nội dung giải trí qua YouTube, trên máy hay web</span></p>\r\n<p style="text-align: center;"><img class="border_img" src="images/news/0610/blackberry-os-6-13.jpg" border="0" /><br /><span style="color: #888888;">Gallery thân thiện, máy hỗ trợ cảm ứng đa điểm</span></p>\r\n<p style="text-align: center;"><img class="border_img" src="images/news/0610/blackberry-os-6-14.jpg" border="0" /><span style="color: #888888;"><br />Tổng hợp tất cả liên lạc trong một hình ảnh</span></p>\r\n<p style="text-align: right;">Nguồn tin:<strong> Số Hóa</strong></p>', 1, 1, 0, 5, '2010-06-08 16:07:04', 62, '', '2010-07-02 18:22:47', 62, 0, '0000-00-00 00:00:00', '2010-06-08 16:07:04', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 19, 0, 3, 'OS 6', '', 0, 109, 'robots=\nauthor='),
(64, 'BlackBerry Bold 9700 phiên bản màu trắng', 'blackberry-bold-9700-phien-ban-mau-trang', '', '<p><strong>Sau phiên bản màu đen, BlackBerry tiếp tục giới thiệu model vỏ trắng của chiếc  Bold 9700 với cấu hình không đổi.</strong></p>\r\n', '\r\n<p style="text-align: center;"><img class="border_img" src="images/news/0610/blackberry-bold-9700-white.jpg" border="0" /><br /><span style="color: #888888;">Bold 9700 màu trắng bên cạnh model màu đen</span></p>\r\n<p>Năm ngoái, Bold 9000 sau thời gian bán ra, hãng cũng  trình làng bản màu trắng. Hiện tại, phiên bản mới của BlackBerry 9700 đã  xuất hiện trên trang web của hãng tại Thái Lan, mức giá khoảng 739 USD.</p>\r\n<p style="text-align: left;">BlackBerry Bold 9700 là model nối tiếp <span id="cpms_link0" onclick="cpms_Intext.aj(0);" onmouseover="cpms_Intext.f(0);" onmouseout="cpms_Intext.Z();">thành công</span> của Bold 9000 với thiết kế  mỏng và gọn gàng hơn, tuy nhiên RIM vẫn để lại bàn phím QWERTY dễ dùng,  các tính năng kết nối, giải trí đa phương tiện cùng màn hình độ nét cao.</p>\r\n<p style="text-align: right;">Nguồn tin<strong>: Số Hóa</strong></p>', 1, 1, 0, 5, '2010-06-08 16:42:01', 62, '', '2010-07-02 18:22:33', 62, 0, '0000-00-00 00:00:00', '2010-06-08 16:42:01', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 7, 0, 8, '9700', '', 0, 34, 'robots=\nauthor='),
(66, 'Đơn giản mà đầy trẻ trung với thời trang thu nổi bật', 'don-gian-ma-day-tre-trung-voi-thoi-trang-thu-noi-bat', '', '<div>Công sở không chỉ là nơi bạn thể hiện tài năng trong sự nghiệp mà còn là môi trường để bạn thể hiện vẻ đẹp thanh lịch, gu <span><a href="http://tintucthoitrang.com/" target="_blank" title="Thoi trang">thời trang</a></span> hợp mốt. Chính vì vậy, dù ở bất cứ vị trí nào thì bạn cũng cần phải chú ý đến diện mạo của mình.</div>\r\n<div>\r\n', '\r\n</div>\r\n<div>\r\n<p>Một số lời khuyên sau đây chắc chắn sẽ là hành trang hữu ích cho bạn để trở nên chuyên nghiệp trước mắt đồng nghiệp:</p>\r\n<p>1. Sơ mi + chân váy</p>\r\n<p>Kiểu kết hợp sơ mi + chân váy vốn rất được ưa chuộng tại công sở bởi  đây là style rất dễ mix và phổ biến hầu hết với mọi dáng người. Ưu điểm  sơ mi + chân váy là tạo được vẻ thanh lịch, sang trọng và nữ tính. Do  vậy, bạn có thể hoàn toàn yên tâm khi chọn gu <span><a href="http://tintucthoitrang.com/" target="_blank" title="Thoi trang">thời trang</a></span> này mỗi sáng đi làm.</p>\r\n<p>Tạo ấn tượng:</p>\r\n<p>- Nên chọn tông màu áo sáng + váy màu đậm hoặc ngược lại để tạo được sự tương phản khi mặc lên người.<br />- Nên kết hợp cùng xăng đan hoặc <span><a href="http://tintucthoitrang.com/phu-kien/thoi-trang-giay-dep" target="_blank" title="giày">giày</a></span> cao gót thì dáng bạn sẽ điệu đà hơn.<br />- Thêm một vài <span><a href="http://tintucthoitrang.com/phu-kien" target="_blank" title="phụ kiện">phụ kiện</a></span> như thắt lưng, đồng hồ, dây chuyền mảnh dẻ, <span><a href="http://tintucthoitrang.com/phu-kien/thoi-trang-tui-xach" target="_blank" title="túi xách">túi xách</a></span>…để hoàn thiện phong cách của mình.<br />- Nếu buổi sáng trời se lạnh, bạn nên mang theo một chiếc áo khoác mỏng nhẹ.<br />- Trang phục sạch sẽ, đầu <span><a href="http://tintucthoitrang.com/thoi-trang/thoi-trang-toc" target="_blank" title="tóc">tóc</a></span> gọn gàng.</p>\r\n</div>\r\n<p> </p>\r\n<div><img src="http://img.2sao.vietnamnet.vn/2010/09/09/15/39/080910congso22.jpg" border="0" />\r\n<p><img src="http://img.2sao.vietnamnet.vn/2010/09/09/15/39/080910congso32%20%282%29.jpg" border="0" /></p>\r\n<p><img src="http://img.2sao.vietnamnet.vn/2010/09/09/15/39/080910congso34%20%282%29.jpg" border="0" /></p>\r\n<p><img src="http://img.2sao.vietnamnet.vn/2010/09/09/15/40/080910congso36%20%282%29.jpg" border="0" /></p>\r\n</div>\r\n<p> </p>\r\n<div><img src="http://img.2sao.vietnamnet.vn/2010/09/09/15/40/080910congso37.jpg" border="0" />\r\n<p><img src="http://img.2sao.vietnamnet.vn/2010/09/09/15/39/080910congso29.jpg" border="0" /></p>\r\n<p><img src="http://img.2sao.vietnamnet.vn/2010/09/09/15/39/080910congso33%20%282%29.jpg" border="0" /></p>\r\n<p><img src="http://img.2sao.vietnamnet.vn/2010/09/09/15/39/080910congso31%20%282%29.jpg" border="0" /></p>\r\n<p><img src="http://img.2sao.vietnamnet.vn/2010/09/09/15/39/080910congso28.jpg" border="0" /></p>\r\n<p><img src="http://img.2sao.vietnamnet.vn/2010/09/09/15/39/080910congso3.jpg" border="0" /></p>\r\n<p><img src="http://img.2sao.vietnamnet.vn/2010/09/09/15/39/080910congso30.jpg" border="0" /></p>\r\n<p><img src="http://img.2sao.vietnamnet.vn/2010/09/09/15/39/080910congso1.jpg" border="0" /></p>\r\n<p><img src="http://img.2sao.vietnamnet.vn/2010/09/09/15/39/080910congso17.jpg" border="0" /></p>\r\n<p><img src="http://img.2sao.vietnamnet.vn/2010/09/09/15/39/080910congso27.jpg" border="0" /></p>\r\n<p><img src="http://img.2sao.vietnamnet.vn/2010/09/09/15/39/080910congso2.jpg" border="0" /></p>\r\n<p><img src="http://img.2sao.vietnamnet.vn/2010/09/09/15/39/080910congso15.jpg" border="0" /></p>\r\n<p><img src="http://img.2sao.vietnamnet.vn/2010/09/09/15/39/080910congso16.jpg" border="0" /></p>\r\n<div>2. Sơ mi + <span><a href="http://tintucthoitrang.com/" target="_blank" title="quần">quần</a></span> jeans\r\n<div>Bởi sự trẻ trung và năng động nên kiểu sơ mi + <span><a href="http://tintucthoitrang.com/" target="_blank" title="quần">quần</a></span> jeans là kiểu kết hợp bạn nên có để thay đổi gu <span><a href="http://tintucthoitrang.com/" target="_blank" title="Thoi trang">thời trang</a></span> trong những ngày làm việc cuối tuần.\r\n<p>Áo sơ mi cũng có nhiều thiết kế cho bạn lựa chọn đó là sơ mi ngắn,  bó, chiết eo hoặc sơ mi dài dáng rộng thùng thình chùm hông. Với những  bạn gái nhỏ nhắn thì nên mặc áo sơ mi ngắn, trong khi bạn gái cao và có <span><a href="http://tintucthoitrang.com/phu-kien/trang-suc-thoi-trang" target="_blank" title="vòng">vòng</a></span> 3 quá cỡ thì nên mặc sơ mi dáng dài sẽ che đi số đo phần hông của bạn.  Ngoài ra khi mặc áo sơ mi dáng dài bạn nên làm điệu với một chiếc thắt  lưng nhỏ xinh.</p>\r\n</div>\r\n</div>\r\n<p><img src="http://img.2sao.vietnamnet.vn/2010/09/09/15/40/080910congso6.jpg" border="0" /></p>\r\n<p><img src="http://img.2sao.vietnamnet.vn/2010/09/09/15/40/080910congso7.jpg" border="0" /></p>\r\n<p><img src="http://img.2sao.vietnamnet.vn/2010/09/09/15/40/080910congso39.jpg" border="0" /></p>\r\n<p><img src="http://img.2sao.vietnamnet.vn/2010/09/09/15/40/080910congso5.jpg" border="0" /></p>\r\n<p><img src="http://img.2sao.vietnamnet.vn/2010/09/09/15/40/080910congso4.jpg" border="0" /></p>\r\n<p><img src="http://img.2sao.vietnamnet.vn/2010/09/09/15/40/080910congso8.jpg" border="0" /></p>\r\n<p><img src="http://img.2sao.vietnamnet.vn/2010/09/09/15/40/080910congso40.jpg" border="0" /></p>\r\n<div>Nên tránh:\r\n<p>- Ăn mặc luộm thuộm, quá hớ hênh sẽ làm hỏng hình ảnh của bạn trong mắt đồng nghiệp.<br />-  Tránh các loại áo bằng ren mỏng manh, áo hai dây.<br />- Giày cao đế quá sẽ làm bạn khó khăn đi lại và tạo tiếng ồn cho người xung quanh.</p>\r\n</div>\r\n<p><img src="http://img.2sao.vietnamnet.vn/2010/09/09/15/39/080910congso10.jpg" border="0" /></p>\r\n<p><img src="http://img.2sao.vietnamnet.vn/2010/09/09/15/39/080910congso20.jpg" border="0" /></p>\r\n<p><img src="http://img.2sao.vietnamnet.vn/2010/09/09/15/40/080910congso9.jpg" border="0" /></p>\r\n<p><img src="http://img.2sao.vietnamnet.vn/2010/09/09/15/39/080910congso21.jpg" border="0" /></p>\r\n<p><img src="http://img.2sao.vietnamnet.vn/2010/09/09/15/39/080910congso19.jpg" border="0" /></p>\r\n<p><img src="http://img.2sao.vietnamnet.vn/2010/09/09/15/39/080910congso35%20%282%29.jpg" border="0" /></p>\r\n<div>3. Váy liền thân:\r\n<div>Vào mùa thu, những chiếc váy liền thân cũng đang trở thành một  trong những xu hướng được nhiều bạn trẻ yêu thích. Váy liền thân tạo một  vẻ đẹp duyên dáng và hiện đại, hơn nữa váy liền thân luôn tiết kiệm  được thời gian cho bạn khi mặc.</div>\r\n</div>\r\n<p><img src="http://img.2sao.vietnamnet.vn/2010/09/09/15/40/080910congso50.jpg" border="0" /></p>\r\n<p><img src="http://img.2sao.vietnamnet.vn/2010/09/09/15/40/080910congso49.jpg" border="0" /></p>\r\n<p><img src="http://img.2sao.vietnamnet.vn/2010/09/09/15/40/080910congso48.jpg" border="0" /></p>\r\n<p><img src="http://img.2sao.vietnamnet.vn/2010/09/09/15/40/080910congso44.jpg" border="0" /></p>\r\n<div>\r\n<div>Điểm cộng:\r\n<p>- Chọn thiết kế điệu đà với những đường sun nhún, túi xẻ tạo điểm nhấn<br />- Váy liền thân cắt hai mảnh, có ly ở ngực, hợp với các bạn có <span><a href="http://tintucthoitrang.com/phu-kien/trang-suc-thoi-trang" target="_blank" title="vòng">vòng</a></span> ngực nhỏ, còn liền một mảnh thì hợp với các bạn có <span><a href="http://tintucthoitrang.com/phu-kien/trang-suc-thoi-trang" target="_blank" title="vòng">vòng</a></span> 3 hơi đầy đặn một chút.<br />- Có thể chọn váy chui, kéo khóa hay đôi khi một mảnh hoặc hai mảnh tùy thuộc vào sở thích của bạn.<br />- Có thể mặc thêm một chiếc áo vest ngắn, mỏng ở bên ngoài vừa đẹp lại đảm bảo sức khỏe.<br />-  Với váy liền thân bạn nên đi <span><a href="http://tintucthoitrang.com/phu-kien/thoi-trang-giay-dep" target="_blank" title="giày">giày</a></span> hoặc xăng đan cao gót nhé.</p>\r\n</div>\r\n</div>\r\n<p><img src="http://img.2sao.vietnamnet.vn/2010/09/09/15/40/080910congso45.jpg" border="0" /></p>\r\n<p><img src="http://img.2sao.vietnamnet.vn/2010/09/09/15/40/080910congso46.jpg" border="0" /></p>\r\n<p><img src="http://img.2sao.vietnamnet.vn/2010/09/09/15/40/080910congso47.jpg" border="0" /></p>\r\n<p><img src="http://img.2sao.vietnamnet.vn/2010/09/09/15/40/080910congso43.jpg" border="0" /></p>\r\n<p><img src="http://img.2sao.vietnamnet.vn/2010/09/09/15/40/080910congso41.jpg" border="0" /></p>\r\n<div>Hãy thử cho mình nhiều phong cách ăn mặc khác nhau, bạn sẽ có sự tự  tin dù ở bất cứ nơi đâu! Chúc bạn luôn tạo được phong cách ấn tượng sau  khi tham khảo những lời khuyên trên.</div>\r\n</div>', 1, 1, 0, 6, '2010-06-08 21:15:33', 62, '', '2010-10-12 06:40:27', 82, 0, '0000-00-00 00:00:00', '2010-06-08 21:15:33', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 36, 0, 6, 'OS 6', '', 0, 282, 'robots=\nauthor='),
(65, 'Ảnh đẹp chiếc BlackBerry 9800 rò rỉ ', 'anh-dep-chiec-blackberry-9800-ro-ri-', '', '<p><strong>Những hình ảnh mới, đẹp hơn về chiếc BlackBerry 9800 kết  hợp giữa màn hình cảm ứng và bàn phím trượt xuất hiện tại Trung Quốc.</strong></p>\r\n', '\r\n<p>Trước đó, BlackBerry 9800 xuất hiện trên Internet với  những đoạn video thực tế, tuy nhiên đây là hình ảnh rõ ràng nhất về  model mà RIM đang có kế hoạch ra mắt. Dưới đây là 12 tấm ảnh đẹp về  model sắp xuất hiện này xuất hiện trên một website Trung Quốc.</p>\r\n<p style="text-align: center;"><img class="border_img" src="images/news/0610/blackberry-9800-1.jpg" border="0" /><br /><span style="color: #888888;">Đây là chiếc điện thoại trượt có màn hình cảm ứng...</span></p>\r\n<p style="text-align: center;"><img class="border_img" src="images/news/0610/blackberry-9800-2.jpg" border="0" /><br /><span style="color: #888888;">...lẫn bàn phím QWERTY trượt ra phía dưới</span></p>\r\n<p style="text-align: center;"><img class="border_img" src="images/news/0610/blackberry-9800-3.jpg" border="0" /><br /><span style="color: #888888;">Model cảm ứng này không trang bị công nghệ SurePress như Storm</span></p>\r\n<p style="text-align: center;"><img class="border_img" src="images/news/0610/blackberry-9800-4.jpg" border="0" /><br /><span style="color: #888888;">Bàn phím ảo trên màn hình cảm ứng</span></p>\r\n<p style="text-align: center;"><img class="border_img" src="images/news/0610/blackberry-9800-5.jpg" border="0" /><br /><span style="color: #888888;">Camera được dự đoán là 5 Megapixel, bộ nhớ trong của máy là 512MB</span></p>\r\n<p style="text-align: center;"><img class="border_img" src="images/news/0610/blackberry-9800-6.jpg" border="0" /><br /><span style="color: #888888;">Mặt sau của máy</span></p>\r\n<p style="text-align: center;"><img class="border_img" src="images/news/0610/blackberry-9800-7.jpg" border="0" /><br /><span style="color: #888888;">Phía trên</span></p>\r\n<p style="text-align: center;"><img class="border_img" src="images/news/0610/blackberry-9800-8.jpg" border="0" /><br /><span style="color: #888888;">Cạnh trái khai trượt ra với cổng micro USB</span></p>\r\n<p style="text-align: center;"><img class="border_img" src="images/news/0610/blackberry-9800-9.jpg" border="0" /><br /><span style="color: #888888;">Bàn phím QWERTY khá hẹp với 4 hàng nút bấm phía dưới</span></p>\r\n<p style="text-align: center;"><img class="border_img" src="images/news/0610/blackberry-9800-10.jpg" border="0" /><br /><span style="color: #888888;">Pin của máy khoảng 1.380 mAh, khe cắm thẻ nhớ phía sau</span></p>\r\n<p style="text-align: center;"><img class="border_img" src="images/news/0610/blackberry-9800-11.jpg" border="0" /><br /><span style="color: #888888;">Khe cắm SIM</span></p>\r\n<p style="text-align: center;"><img class="border_img" src="images/news/0610/blackberry-9800-12.jpg" border="0" /><span style="color: #888888;"><br />So sánh kích thước với Storm 9520, 9800 và Bold 9700 (từ trên xuống  dưới)</span></p>\r\n<p style="text-align: right;">Ảnh: <strong>Berrytimes</strong><em><em> </em></em></p>', 1, 1, 0, 5, '2010-06-08 16:53:09', 62, '', '2010-06-30 19:28:15', 62, 0, '0000-00-00 00:00:00', '2010-06-08 16:53:09', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 6, 0, 7, '9800', '', 0, 78, 'robots=\nauthor='),
(67, 'RIM đầu tư vào ngành công nghiệp di động Trung Quốc', 'rim-dau-tu-vao-nganh-cong-nghiep-di-dong-trung-quoc', '', '<p>BlackBerry Partners Fund, quỹ đầu tư vào việc phát triển ứng dụng cho điện thoại BlackBerry và các thiết bị di động khác, vừa ký kếp một thỏa thuận với quỹ China Broadband Capital Partners để lập nên một quỹ chung có số vốn đầu tư là 100 triệu USD, gọi tên là BlackBerry Partners Fund China.</p>\r\n', '\r\n<p>Quỹ này sẽ đầu tư vào ngành internet di động và công nghệ đám mây di động tại Trung Quốc.</p>\r\n<p style="text-align: center;"><img class="border_img" src="images/news/0610/rim-1.jpg" border="0" width="500" /></p>\r\n<p>China Broadband Capital Partners (CBC) là quỹ tài chính của Trung Quốc, kiêm quản lý các tài sản tư thế chấp, chuyên đầu tư trong các lĩnh vực truyền thông, internet và đa phương tiện. Trong khi đó BlackBerry Partners Fund là quỹ thuộc quản lý của Research In Motion, công ty bán điện thoại BlackBerry.</p>\r\n<p>Theo Gregory Shea, đồng phó chủ tịch và giám đốc của RIM Trung Quốc cho biết, đây là thời điểm thích hợp để đầu tư vào công nghệ đám mây di động và internet di động. Ngoài ra, quỹ mới thành lập này cũng sẽ nhắm vào mảng phát triển mạng 3G tại quốc gia đông dân nhất thế giới này. Quỹ mới cũng sẽ hỗ trợ việc giới thiệu chợ ứng dụng trực tuyến BlackBerry App World tại Trung Quốc bằng việc hỗ trợ các nhà phát triển tại đây.</p>\r\n<p style="text-align: right;">Nguồn: <strong>Tinh Tế</strong></p>', 1, 1, 0, 5, '2010-06-08 21:26:34', 62, '', '2010-07-02 18:19:02', 62, 0, '0000-00-00 00:00:00', '2010-06-08 21:26:34', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 21, 0, 4, 'RIM', '', 0, 249, 'robots=\nauthor='),
(68, 'Một số lỗi và cách khắc phục trên BlackBerry', 'mot-so-loi-va-cach-khac-phuc-tren-blackberry', '', '<p><span style="font-family: arial,helvetica,sans-serif;"><strong>Lỗi là  một phần tất yêu trong quá trình sử dụng BlackBerry, dưới đây   là một  số cách khắc phục cho những lỗi tương ứng.</strong></span></p>\r\n<p style="text-align: center;"><span style="font-family: arial,helvetica,sans-serif;"><strong><img class="border_img" src="images/news/0610/blackberry-experience.jpg" border="0" /><br /></strong></span></p>\r\n<p><strong>1. Lỗi 300-303</strong></p>\r\n<p>Thông thường, các lỗi 300-303 là những lỗi quá trình cài đặt phần mềm.</p>\r\n<p>Lưu ý: Trong suốt quá trình dùng BDM để cài đặt phần mềm hoặc Uprom, bạn không nên vội vã, cứ để quá trình Config và Updates phần mềm chạy cho tới khi nào xong thì thôi. Quá trình Updates này tuy hơi lâu, nhưng đôi khi lại phát hiện ra những phần mềm xung đột với nhau, và bạn có thể gỡ bỏ nó sau khi quá trình Updates hoàn thành.<strong><br /></strong></p>\r\n<p><strong>2.</strong> <strong>Lỗi 395</strong></p>\r\n<p>Lỗi 395 thường xảy ra bởi các phần mềm cài thêm vào máy (Third-party application).</p>\r\n<p><strong>Cách giải quyết vấn đề</strong>: Xóa và cài đặt lại tất cả phần mềm trên BlackBerry. Lưu ý, cách này sẽ xóa toàn bộ phần mềm và data trên máy của bạn. Cho nên, việc đầu tiên là phải làm theo bước đầu tiên sau đây:</p>\r\n<p><strong>Backup dữ liệu có trên máy</strong> (chủ yếu là tin nhắn, danh bạ và một số task, memo, hay các ghi nhớ trong calendar).</p>\r\n<p>Sau đó (tất nhiên là vẫn dùng <strong>BlackBerry Desktop Manager</strong> (BDM), chọn <strong>Application Loader/Next/Next</strong>, bạn sẽ vào được mục <strong>Device Application Selection</strong>, nhìn xuống góc phải phía dưới, chọn <strong>Setting</strong> (hoặc <strong>Advanced</strong>, tùy version của BDM), chọn <strong>Erase all application data and Erase all currently installed applications, Next,</strong> và cuối cùng chọn Finish. Đến lúc này, toàn bộ data trên Blackberry sẽ bị xóa sạch, tuy nhiên, trong lúc này, OS và Application sẽ được load trở lại vào máy của bạn.</p>\r\n<p><strong>3. Lỗi 310 - 314</strong></p>\r\n<p>Đây là một trong những lỗi liên quan đến phần cứng. Tuy nhiên cũng dễ dàng cứu vãn được tình thế. Hãy thực hiện một bước <strong>Hard Reset</strong> điển hình sau:</p>\r\n<p>Tháo pin ra khỏi điện thoại Blackberry.</p>\r\n<p>Chờ một thời gian, khoảng 30s (để cho mạch trở về trạng thái ổn định, tụ điện trên board xả hết điện tích), sau đó gắn pin lại.</p>\r\n<p><strong>Lý do:</strong></p>\r\n<p>1. Về phần cứng: Thứ nhất, lỗi này thường là nguyên nhân của Rom (Read Only Memory), quá trình xử lý đọc dữ liệu trên BB khó khăn, nó báo lỗi này. Vì vậy tháo pin cũng là các refresh ROM. Thứ hai, việc xử lý dòng hiển thị trên LCD gặp khó khăn, các lỗi từ 310 – 314 cũng được xuất ra. Thứ ba, là hỏng hóc từ xử lý bàn phím, trackwell, trackball… Ngoài ra cũng còn 1 số thứ liên quan như: bộ detect sóng yếu, không thể gửi nhận được tin nhắn. Những lỗi này thì nhẹ, có thể hard reset sẽ vào được.</p>\r\n<p>2. Về phần mềm, có thể Bluetooth không nhận được, phần mềm, ứng dụng không cài được hoặc bị xung đột, BDM không thể detect được điện thoại BlackBerry và cuối cùng, nó sẽ xuất ra thông báo lỗi: 310…</p>\r\n<p><strong>4. Lỗi 317</strong></p>\r\n<p>Cách giải quyết thường thấy là: Hạ bản ROM đang dùng xuống bản thấp hơn. Đến khi nào được thì thôi. Qua quá trình làm cũng như tìm hiểu, lỗi này hầu như xuất hiện trên dòng máy 8110.</p>\r\n<p>Nếu bạn gặp lỗi này ở 8110 nói riêng hay 81xx nói chung, bình tĩnh Up ROM theo bản thấp nhất của nó thử xem.</p>\r\n<p>Các lỗi phải Uprom lại: <strong>400-564, 320-325, 330-339</strong> (Liên quan tới ứng dụng, hoặc các module .cod vừa cài đặt bị xung đột), <strong>360-363</strong> (Liên quan tới Flash – Có thể Flash yếu, hay gặp ở các dòng xuất xứ từ TQ hoặc không rõ nguồn gốc).</p>\r\n<p>Với các lỗi này, bình tình tìm bản ROM phù hợp mà cài đặt lại (Up ROM).</p>\r\n<p><strong>5. Lỗi 340-343</strong></p>\r\n<p>Lỗi tràn bộ nhớ, hoặc Flash yếu.</p>\r\n<p>Cách giải quyết trước tiên, xóa đi tin nhắn không cần thiết, hoặc cuộc gọi đã nhận, cuộc gọi nhỡ,...  hoặc những ghi chú trên <strong>Calendar</strong>, xóa <strong>History</strong> trong <strong>Opera mini</strong>, xóa <strong>Cache</strong> trong <strong>Browser</strong>.</p>\r\n<p>Nếu đã xóa rồi mà không được, cách duy nhất còn lại là chạy lại ROM.</p>\r\n<p>6. Lỗi 350-359: Mặc dù được phân chia ra thành một loại lỗi khác nhau, nhưng hầu như các cách được xử lý giống như các lỗi <strong>300- 303, 310, 314.</strong></p>\r\n<p><strong>7. Lỗi 505 – 507</strong></p>\r\n<p>Hầu như các bạn đều biết lỗi này là do không có application được load trên máy. Nguyên nhân có thể là trong quá trình cài đặt phần mềm, bạn lỡ tay xóa hết những cái cũ, mà quên add cái mới, hoặc là tất cả dữ liệu, phần mềm, application trên máy bị xóa khi bạn nhập sai password quá 10 lần (mặc định) (hoặc ít hơn tùy theo bạn cho phép nhập pass bao nhiêu lần), hoặc đang cài ROM (lúc đang xóa phần mềm, mà vô tình kết nối bị đứt (disconnect). Tóm lại là BlackBerry không có application.</p>\r\n<p><strong>Giải quyết:</strong> Up lại ROM</p>\r\n<p>Tuy nhiên, nếu là một người không thích uprom ngay mà muốn tìm hiểu để lần sau không vấp phải, bạn nên tham khảo bước sau:</p>\r\n<p>Kiểm tra đã cài bản ROM phù hợp lên điện thoại hay chưa, đã xóa <strong>vendor.xml</strong> chưa?</p>\r\n<p>Chỉ duy nhất kết nối một điện thoại BlackBerry trực tiếp với một máy tính (nếu bạn chưa biết cách Up ROM cho nhiều điện thoại BlackBerry cùng một lúc).</p>\r\n<p>Tắt các chương trình diệt virus, để chương trình này không truy xuất vào thẻ nhớ của điện thoạ trong lúc Up ROM (nếu điện thoại không có thẻ nhớ thì thôi).</p>\r\n<p>Tiến hành Up ROM giống như cài phần mềm, quá đơn giản.</p>\r\n<p>Nếu lỗi 507 hay 505 xuất hiện khi bạn nhập sai password nhiều lần thì hãy nhanh Up ROM.</p>\r\n<p>Nhưng nếu lỗi này do chương trình quản lý nguồn (Power Management) trên Máy tính gây ra, bạn có thể làm các bước sau:</p>\r\n<p>Click phải vào My <strong>Computer/Manage/Device Manage</strong> chọn <strong>Univerrsal Serial Bus Controller</strong>, click phải lần lượt vào các dòng <strong>USB root hub</strong>, chọn <strong>Properties</strong>, sau đó chuyển sang thẻ <strong>Power</strong>, bỏ dấu check trong box<strong> Allow the computer to turn off this device to save power</strong>.</p>\r\n<p>Một lưu ý cuối cùng cho lỗi 505 và 507 này, đôi khi rất khó khăn khi dùng BDM để cài, bạn hãy dùng chương trình <strong>Loader.exe</strong> để tiến hành Up ROM nhé.<strong></strong></p>\r\n<p style="text-align: right;"><strong>BlackBerry Sài Gòn</strong> (Sưu tầm)</p>', '', 1, 1, 0, 4, '2010-06-27 09:40:56', 62, '', '2010-07-02 19:08:10', 62, 0, '0000-00-00 00:00:00', '2010-06-27 09:40:56', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 16, 0, 9, '', '', 0, 34, 'robots=\nauthor='),
(69, '11 mẹo tiết kiệm pin cho điện thoại BlackBerry', '11-meo-tiet-kiem-pin-cho-dien-thoai-blackberry', '', '<p><strong>Nếu bạn đang sử dụng dòng điện thoại Blackberry nam tính của RIM thì với  11 mẹo sau sẽ giúp bạn tiết kiệm dung lượng pin một cách đáng kể.</strong></p>\r\n<p style="text-align: center;"><strong><img src="images/news/0610/blackberry-battery.jpg" border="0" /><br /></strong></p>\r\n<p><strong>1. Xoá những ứng dụng bạn không  dùng</strong></p>\r\n<p>+ Với thao tác loại bỏ các ứng dụng thừa thãi, bạn  vừa tăng dung lượng bộ nhớ và giúp tiết kiệm pin.<br />+ Để xoá những  ứng dụng không dùng thì cách đơn giản là bạn vào <strong>Options</strong> (hoặc nhấn phím <strong>O</strong> nếu như bạn để chế độ phím tắt)  --&gt; chọn <strong>Advanced Options</strong> sau đó chọn <strong>Applications</strong> rồi tìm ứng dụng mà bạn cần loại bỏ và nhấn <strong>Delete</strong></p>\r\n<p><strong>2. Sạc pin nếu có thể</strong></p>\r\n<p>Sạc pin cho điện thoại BlackBerry  của bạn mọi lúc nếu có thể.</p>\r\n<p><strong>3. Thay đổi các thiết lập về  Media</strong></p>\r\n<p>+ Giảm âm lượng khi nghe nhạc<br />+ Sử dụng tai  nghe (headphone)<br />+ Nạp các tệp tin nhạc sử dụng công cụ <strong>BlackBerry  Desktop Manager</strong><br />+ Tắt các hiệu ứng âm thanh qua đường dẫn <strong>Media  --&gt; Options</strong></p>\r\n<p><strong>4. Thay đổi các thiết lập hiển  thị</strong></p>\r\n<p>+ Các thao tác trong mục <strong>Options --&gt;  Screen/Keyboard</strong><br />+ Giảm thời gian trễ tạm ngưng của màn  hình.<br />+ Giảm độ sáng màn hình<br />+ Cho điện thoại vào bao da dành  riêng cho <strong>BlackBerry (Holster)</strong> sẽ giúp bạn tắt màn hình  LCD một cách tự động.<br />+ Tắt âm bàn phím khi gõ, thao tác.</p>\r\n<p><strong>5.  Duyệt web hiệu quả</strong></p>\r\n<p>+ Lướt web khi cần thiết.<br />+ Chuyển chế độ lặp lại ảnh động sang mức thấp nhất theo đường dẫn <strong>Browser  --&gt; Options --&gt; General Properties</strong><br />+ Đóng trình duyệt  khi sử dụng xong bằng phím <strong>ESC</strong>, không dùng phím từ  chối cuộc gọi <strong>(End key)</strong> vì khi tắt bằng phím này chương  trình sẽ vẫn chạy nền.</p>\r\n<p><strong>6. Quản lý các kết nối mạng</strong></p>\r\n<p>Tắt các kết nối không sử dụng như định vị toàn cầu <strong>(GPS)</strong>,  <strong>Wifi</strong>, <strong>Bluetooth</strong>.<br />Sử dụng chức  năng <strong>Auto On/Off</strong> (giúp bạn tự động tắt và bật điện  thoại Blackberry theo thời gian bạn đặt sẵn).<br />Chỉ sử dụng một chế  độ mạng (2G hoặc 3G) trong một thời điểm.</p>\r\n<p><strong>7. Tạo lối tắt  vào ứng dụng</strong></p>\r\n<p>Sử dụng lối tắt để kích hoạt các menu <strong>Java</strong> theo đường dẫn <strong>Browser --&gt; Options --&gt; Browser  Configuration</strong><strong></strong></p>\r\n<p><strong>8. Quản lý máy ảnh</strong></p>\r\n<p>+ Các  thao tác theo đường dẫn <strong>Camera --&gt; Options</strong><br />+ Tắt chế độ <strong>Flash</strong> trong điều kiện ánh sáng tốt.<br />+ + Thiết lập cỡ ảnh chụp ở mức nhỏ nhất (<strong>Small</strong>).<br />Thiết lập chế độ hiệu ứng màu và chất lượng ảnh chụp ở mức bình thường (<strong>Normal</strong>).</p>\r\n<p><strong>9.  Quản lý các ứng dụng</strong></p>\r\n<p>+ Khi thoát khỏi ứng dụng, bạn  chắc chắn là đã sử dụng lựa chọn <strong>Close</strong> hoặc <strong>Exit</strong> (tuỳ ứng dụng), tránh để chương trình chạy nền.<br />+ Đăng xuất khởi các  ứng dụng của hãng thứ 3 khi chúng không cần thiết như các chương trình  tán gẫu tức thời (<strong>Instant Messaging</strong>).</p>\r\n<p><strong>10.  Tắt các đèn báo</strong></p>\r\n<p>+ Các thao tác trong mục <strong>Profiles</strong><br />+ Tắt các thông báo bằng đèn.<br />+ Tắt đèn LED thông báo khi ở vùng sóng  yếu.</p>\r\n<p><strong>11. Sử dụng chức năng thu nhỏ khi dùng GPS</strong></p>\r\n<p style="text-align: left;">Dùng chức năng thu nhỏ để có góc nhìn tốt nhất mà bạn vẫn có thể nhìn  được khi sử dụng GPS.</p>\r\n<p style="text-align: right;">Nguồn tin: <strong>XHTT Online</strong></p>', '', 1, 1, 0, 4, '2010-06-27 10:35:28', 62, '', '2010-07-03 19:43:26', 62, 0, '0000-00-00 00:00:00', '2010-06-27 10:35:28', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 8, 0, 8, '', '', 0, 24, 'robots=\nauthor=');
INSERT INTO `hdt_content` (`id`, `title`, `alias`, `title_alias`, `introtext`, `fulltext`, `state`, `sectionid`, `mask`, `catid`, `created`, `created_by`, `created_by_alias`, `modified`, `modified_by`, `checked_out`, `checked_out_time`, `publish_up`, `publish_down`, `images`, `urls`, `attribs`, `version`, `parentid`, `ordering`, `metakey`, `metadesc`, `access`, `hits`, `metadata`) VALUES
(70, 'Đồng bộ danh bạ BlackBerry với Outlook', 'dong-bo-danh-ba-blackberry-voi-outlook', '', '<p><strong>Một phương pháp quản lý contacts phổ thông và nhiều người biết nhất hiện nay là sử dụng Outlook của Microsoft.</strong></p>\r\n<p>Có bạn cho rằng cứ backup dữ liệu trên BlackBerry bằng<strong> Blackberry Desktop Manager (BDM)</strong> là xong, nếu không may nghịch ngợm làm mất dữ liệu thì Restore. Cách này chỉ đúng khi bạn mãi mãi dùng thiết bị ấy, khi bạn chuyển qua thiết bị khác hoặc nếu là của hãng khác, đời máy khác thì bộ backup cũng không thể dùng được. Vậy nên, tốt nhất là chúng ta sao lưu Contacts qua Outlook.</p>\r\n<p><strong>Bước 1:</strong> Đồng bộ điện thoại BlackBerry (hay bất cứ thiết bị handheld, PDA nào) với máy tính bằng phần mềm hỗ trợ, với BlackBerry thì dùng BDM</p>\r\n<p><strong>Bước 2:</strong> Dùng tính năng Synchronize bằng cách từ BDM bấm đúp vào biểu tượng này.</p>\r\n<p style="text-align: center;"><img src="images/news/0610/bdm.jpg" border="0" /></p>\r\n<p>Chú ý ở cửa sổ <strong>Synchronize</strong> các bạn chuyển tab <strong>Configuration</strong> -&gt; nhấn nút <strong>Configuration Sync</strong>, ở đây có mấy tùy chọn:</p>\r\n<p>+ Chuyển dữ liệu qua lại giữa PC với BlackBerry<br />+ Chuyển dữ liệu từ PC sang BlackBerry<br />+ Chuyển dữ liệu từ BlackBerry sang PC<br />+ Chương trình sẽ đồng bộ với BlackBerry trên PC, đa phần chọn Outlook.</p>\r\n<p>Ở tab <strong>Synchronize</strong>, trước khi nhấn <strong>Synchronize Now</strong>, các bạn nhớ check vào <strong>Synchronize Organize Data</strong>, sau đó nhấn <strong>Synchronize Now</strong>.</p>\r\n<p>Dữ liệu hai bên sẽ trao đổi. Sau bước này, các bạn mở Contacts trong Outlook sẽ thấy đầy đủ các danh bạ. Như thế là xong một nửa phần sao lưu.</p>\r\n<p><strong>Bước 3:</strong> Tiếp theo, các bạn chỉ việc <strong>Export</strong> (xuất) danh bạ trong Outlook thành một file, bằng cách từ Outlook vào<strong> File -&gt; Import and Export -&gt; Export to a File</strong>. Các bạn cũng có thể <strong>Export</strong> ra bất kỳ định dạng nào mà Outlook hỗ trợ. Chương trình sẽ xuất ra một file, sao lưu file này thì sẽ không bao giờ mất danh bạ, cho dù có mất máy, cho máy, đổi máy…</p>\r\n<p><strong>Bước 4:</strong> Khi <strong>Import </strong>(nhập) vào Contacts, làm tuần tự theo các bước ngược lại: từ Outlook vào <strong>File -&gt; Import and Export -&gt; Import from a file…</strong></p>\r\n<p>Đừng hoảng hốt khi Contacts cả điện thoại lẫn Outlook đều trống trơn.</p>\r\n<p>+ Dọn dẹp xoá bớt bằng cách đồng bộ vào Contacts trong Outlook,<br />+ Xoá những số không cần thiết.<br />+ Tiếp đó, ngắt đồng bộ, xoá hết trong điện thoại<br />+ Và cuối cùng đồng bộ trở lại giữa máy tính với điện thoại để copy Contacts sang.</p>\r\n<p>Tuy nhiên, nếu trước đó, các bạn đặt tùy chọn là chỉ chuyển dữ liệu từ BB sang máy tính thì sau khi Sync, Contacts trong Outlook cũng trắng tinh luôn. Các bạn đối mặt với việc mất danh bạ hoàn toàn.</p>\r\n<p>Đừng hoảng hốt, trước hết dùng <strong>Outlook Restore</strong> lại <strong>File Backup </strong>đã sao lưu, để chắc chắn rằng mình vẫn còn những <strong>Contact</strong> đã sao lưu trong lần Sync gần đây nhất. Tiếp đó, từ <strong>Outlook -&gt; Chọn thư mục mail -&gt; Chọn Delete items</strong> (nằm trong <strong>Personal folders</strong>). Các bạn sẽ thấy tất cả các <strong>Contacts</strong> bị xoá đều nằm trong này. Hãy chọn các <strong>Contacts</strong> cần phục hồi (<strong>chuột + Ctrl hoặc Shift + mũi tên lên xuống</strong>), sau đó nhấn chuột phải, chọn <strong>Move to Folder -&gt; Contacts</strong>, nhấn OK. Sau bước này, tất cả các Contacts vừa bị lỡ xoá sẽ lại nằm đúng chỗ của nó. Cuối cùng các bác có thể Sync bình thường, danh bạ vẫn còn nguyên.</p>\r\n<p>+ Download <strong>BlackBerry Desktop Manager</strong> cho Windows<em> </em><a href="https://www.blackberry.com/Downloads/contactFormPreload.do?code=A8BAA56554F96369AB93E4F3BB068C22&amp;dl=A7B0B96D8B56983C4001DA3E0688A700" target="_blank"><span style="color: #3366cc;">tại đây</span></a></p>\r\n<p style="text-align: left;">+ Download <strong>BlackBerry Desktop Manager</strong> cho Mac OS<em> </em><a href="https://www.blackberry.com/Downloads/contactFormPreload.do?code=CBC462E27100DAD71CDBF606D396DDAD&amp;dl=3C4BB676CED2EDE17E0996B0A4A20B01" target="_blank"><span style="color: #3366cc;">tại  đây</span></a><strong></strong></p>\r\n<p style="text-align: right;"><strong>BlackBerry Sài Gòn</strong> (Sưu tầm)</p>', '', 1, 1, 0, 4, '2010-06-27 10:52:00', 62, '', '2010-07-02 19:07:53', 62, 0, '0000-00-00 00:00:00', '2010-06-27 10:52:00', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 14, 0, 7, '', '', 0, 79, 'robots=\nauthor='),
(71, 'Thủ thuật dành cho BlackBerry', 'thu-thuat-danh-cho-blackberry', '', '<p><strong>Sau đây là một số thủ thuật cơ bản cho người mới sử dụng BlackBerry, hi vọng với những thủ thuật đơn giản này, bạn sẽ sử dụng BlackBerry dễ dàng hơn</strong></p>\r\n<p style="text-align: center;"><strong><img class="border_img" src="images/news/0610/blackberry-lifestyle.jpg" border="0" /><br /></strong><span style="color: #888888;">Với một vài thủ thuật đơn giản, sử dụng BlackBerry sẽ dễ dàng hơn</span><strong></strong></p>\r\n<p><strong>1. Khắc phục lỗi khi gọi cũng như SMS cho các số điện thoại trong danh bạ</strong></p>\r\n<p>Các contact từ các máy khác hay từ trong Sim chuyển sang, khi thì gọi và nhắn tin được, khi thì không. Bạn làm theo sau để khắc phục vấn đề này: Vào <strong>Call Log</strong>, bấm nút cuộn, viên bi (trackball) hay trackpad, chọn <strong>Options</strong>, mục <strong>Smart Dial,</strong> bấm nút cuộn và Chọn Country code là +84.</p>\r\n<p><strong>2. Gán thao tác/ứng dụng cho phím tắt (Conveniont Key)</strong></p>\r\n<p>Vào <strong>Settings</strong> (hay Options), <strong>Screen/Keyboard</strong>, bấm <strong>Convenience Key</strong> (hay Right Side, Left Side Convenience Key), chọn ứng dụng sẽ chạy khi bấm phím tắt này</p>\r\n<p><strong>3. Bật chế độ báo đã nhận tin nhắn</strong></p>\r\n<p>Vào <strong>Settings</strong>, <strong>SMS</strong>, bấm <strong>Delivery Reports</strong>, chọn On</p>\r\n<p><strong>4. Bật chế độ Font Smooth (ClearType, Antilias)</strong></p>\r\n<p>Chế độ này cho phép hiển thị văn bản đẹp hơn, font chữ được làm tròn, mịn và đẹp. Vào <strong>Settings</strong>, <strong>Screen/Keyboard</strong>, bấm vào <strong>Antialias Mode</strong>, chọn <strong>Antialiasing</strong> để bật lên, <strong>No Antialias</strong> nếu muốn tắt</p>\r\n<p><strong>5. Download Hướng dẫn sử dụng (User Guide) hay các phần mềm cập nhật cho thiết bị của bạn</strong></p>\r\n<p>Vào http://na.blackberry.com/eng/support, chọn thiết bị của bạn, website sẽ hiển thị các tài liệu và tài nguyên dành cho thiết bị này.</p>\r\n<p><strong>6. Cách SoftReset và Hard Reset</strong></p>\r\n<p><strong>+ SOFT RESET</strong></p>\r\n<p>Nhấn tổ hợp phím <strong>ALT + CAP + DEL</strong> cùng lúc, hay tháo pin ra và gắn lại.</p>\r\n<p><strong>+ HARD RESET</strong></p>\r\n<p>Tìm sau lưng máy (hay bên trong nắp Pin), có lỗ Reset, dùng bút nhọn chọt vào.</p>\r\n<p>Lưu ý: lẫn Soft Reset và Hard Reset trên BlackBerry đều không làm mất dữ liệu của bạn. Để xóa hết dữ liệu cá nhân có trên máy ta phải dùng chức năng <strong>Wipe HandHeld</strong>, xem thủ thuật thứ 7.</p>\r\n<p><strong>7. Xóa toàn bộ dữ liệu cá nhân với chức năng Wipe Handheld</strong></p>\r\n<p>Vào <strong>Setting</strong>, <strong>Security</strong>, <strong>General Settings</strong>. Tại dòng <strong>Password</strong>, bấm nút cuộn, chọn <strong>Wipe Handheld</strong>, sau đó gõ vào chữ "<strong>blackberry</strong>" để tiến hành.</p>\r\n<p><strong>8. Chuyển sang ứng dụng khác khi đang chạy một ứng dụng</strong></p>\r\n<p>Để chuyển sang ứng dụng khác, nhấn giữ phím <strong>Alt</strong> và nhấn nút <strong>Escape</strong> (nút <strong>Back</strong>) --&gt; Về màn hình chính (Ribbon)</p>\r\n<p>Hay nhấn giữ phím <strong>Alt</strong> và nhấn nút <strong>Escape</strong> (nút <strong>Back</strong>) -&gt; chuyển qua lại giữa các ứng dụng đang mở</p>\r\n<p><strong>9. Điều chỉnh cách gõ cho phù hợp với người Việt Nam</strong></p>\r\n<p>Một số máy để mặc định cách gõ văn bản (input method) theo kiểu gõ tiếng Anh với khả năng tra từ và nhận dạng thông minh. Tuy nhiên phuơng pháp này chỉ thích hợp khi bạn sử dụng tiếng Anh và sẽ bất tiện cho những ai sử dụng tiếng Việt. Để chuyển sang phuơng pháp "truyền thống" - tức là trong cùng 1 phím, muốn gõ ký tự thứ 2 thì chúng ta bấm 2 lần thì ta làm như sau:</p>\r\n<p>Vào <strong>Settings</strong>, chọn <strong>Language</strong>, bấm vào dòng <strong>Input Method</strong>, chọn<strong> English</strong> (<strong>United State, Multitap</strong>)</p>\r\n<p><strong>10. Sắp xếp/Ẩn đi các ứng dụng trong màn hình chính (Main, Launcher)</strong></p>\r\n<p>Các ứng dụng trên màn hình chính được BlackBerry sắp xếp sẳn. Tuy nhiên bạn có thể thay đổi vị trí (thứ tự) hay ẩn những ứng dụng mình không cần sử dụng đi bằng cách sau:</p>\r\n<p>+ Thay đổi vị trí: Tại màn hình chính, di chuyển đến ứng dụng cần thay đổi vị trí, giữ phí Alt đồng thời nhấn Nút cuộn, màn hình sẽ hiển thị một Popup Menu, bạn chọn <strong>Move Application</strong>, dùng nút cuộn để di chuyển đến nơi cần đến rồi lại nhấn Nút cuộn.</p>\r\n<p>+ Ẩn ứng dụng: Tại màn hình chính, di chuyển đến ứng dụng cần thay đổi ẩn, giữ phí Alt đồng thời nhấn Nút cuộn, màn hình sẽ hiển thị một Popup Menu, bạn chọn <strong>Hide Application</strong>.</p>\r\n<p><strong>11. Mở loa ngoài (Speaker) trong lúc đàm thoại<br /></strong></p>\r\n<p style="text-align: left;">Khi đang nói chuyện muốn mở loa ngoài cho to thì nhấn phím "<strong>P</strong>", hay phím có hình cái loa.</p>\r\n<p style="text-align: right;">Nguồn tin: <strong>Tinh tế</strong></p>', '', 1, 1, 0, 4, '2010-06-27 11:18:53', 62, '', '2010-06-30 19:19:46', 62, 0, '0000-00-00 00:00:00', '2010-06-27 11:18:53', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 5, 0, 6, '', '', 0, 35, 'robots=\nauthor='),
(72, 'Cài đặt thông số để dùng GPRS', 'cai-dat-thong-so-de-dung-gprs-tren-blackberry', '', '<p><strong>Việc dùng BlackBerry để truy cập Internet, dùng tin nhắn tức thời (chát chít...)...đã thành hiện thực với các mạng GPRS tại Việt Nam ( ba nhà mạng Vinaphone, Mobifone và Viettel). </strong>Và để dùng đưọc GPRS trên chiếc điện thoại BlackBerry của mình, bạn phải cài đặt thông số cho từng nhà mạng.</p>\r\n<p style="text-align: center;"><img class="border_img" src="images/news/0610/blackberry_lifrstyle-1.jpg" border="0" /></p>\r\n<p><strong>Bước 1:</strong> Kích hoạt dịch vụ GPRS (nếu chưa kích hoạt)</p>\r\n<p>+ Vinaphone xin gọi: 151 để được hướng dẫn.<br />+ Mobifone xin gọi: 145 để được hướng dẫn.<br />+ Viettel xin gọi: 198 để được hướng dẫn.</p>\r\n<p>Hoặc vào trang web của từng mạng</p>\r\n<p><strong>Bước 2:</strong> Thiết lập thông số trên Blackberry:</p>\r\n<p>Vào <strong>Options</strong> --&gt; <strong>Advanced Options</strong> --&gt; kéo xuống dưới cùng chọn <strong>TCP</strong> --&gt; Trong TCP ta lần lượt nhập các thông số mạng vào:</p>\r\n<p><strong>+ Vinaphone:</strong></p>\r\n<p>ANP: 3m-world<br />User name for ANP: mms<br />Password fot ANP: mms</p>\r\n<p><strong>+ Mobifone:</strong></p>\r\n<p>ANP: m-wap<br />User name for ANP: mms<br />Password for ANP: mms</p>\r\n<p><strong>+ Viettel:</strong></p>\r\n<p>ANP: v-internet<br />User name for ANP: để trống<br />Password for ANP: để trống</p>\r\n<p>Sau khi đã làm đúng các hướng dẫn trên mà không vào được bạn có thể thử:</p>\r\n<p>Tháo pin máy ra và lắp lại.</p>\r\n<p>Wipe Handheld và điền lại thông tin: Nhớ sao lưu dữ liệu quan trọng trước khi Wipe Handheld.</p>\r\n<p style="text-align: left;">Truy cập Internet bạn phải có trình duyệt (Browser) ví dụ như Opera mini... được cài vào trước.<strong></strong></p>\r\n<p style="text-align: right;"><strong>BlackBerry Sài Gòn</strong> (Sưu tầm)</p>', '', 1, 1, 0, 4, '2010-06-27 12:04:46', 62, '', '2010-07-02 19:07:29', 62, 0, '0000-00-00 00:00:00', '2010-06-27 12:04:46', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 11, 0, 5, '', '', 0, 61, 'robots=\nauthor='),
(73, 'BlackBerry và những người nổi tiếng', 'blackberry-va-nhung-nguoi-noi-tieng', '', '<p><strong>Điện thoại BlackBerry không chỉ được doanh nhân ưa chuộng mà các  chính khách hay các siêu sao giải trí cũng rất "khoái" thương hiệu điện  thoại này của RIM (Research In Motion). \r\n', '\r\n</strong></p>\r\n<p style="text-align: center;"><strong><img class="border_img" src="images/news/0610/obama-blackberry.jpg" border="0" /><br /></strong><span style="color: #888888;">Người đàn ông quyền lực nhất  thế giới, tổng thống Mỹ Barack Obama nhắn tin<br />cùng BlackBerry 8700  trên chuyên cơ Air Force One<br /></span></p>\r\n<p style="text-align: center;"><span style="color: #888888;"><img class="border_img" src="images/news/0610/adrian-fenty-blackberry.jpg" border="0" /><br /></span><span style="color: #888888;"><span style="font-family: arial,helvetica,sans-serif;">Adrian Fenty, thị trưởng Washington DC cùng bộ sưu tập BlackBerry đang giắt lưng<br />Ảnh: RIMarkable</span></span></p>\r\n<p style="text-align: center;"><img class="border_img" src="images/news/0610/tom-cruise-katie-holmes-blackberry.jpg" border="0" /><br /><span style="color: #888888;">Vợ chồng Tom Cruise và Katie Holmes cũng mê BlackBerry</span></p>\r\n<p style="text-align: center;"><span style="color: #888888;"><img class="border_img" src="images/news/0610/pamela-blackberry.jpg" border="0" /><br /></span><span style="color: #888888;">Quả bom sex Pamela Anderson  đang đi mua sắm, trên tay là BlackBery Curve</span></p>\r\n<p style="text-align: center;"><span style="color: #888888;"><img class="border_img" src="images/news/0610/madonna-blackberry.jpg" border="0" /><br /></span><span style="color: #888888;">Nữ hoàng nhạc Pop Madonna và BlackBerry  Curve</span></p>\r\n<p style="text-align: center;"><span style="color: #888888;"><img class="border_img" src="images/news/0610/kim-kardashian-blackberry.jpg" border="0" /><br /></span><span style="color: #888888;"><span style="font-family: arial,helvetica,sans-serif;">Người đẹp truyền hình nổi tiếng với vòng ba đồ sộ Kim Kardashian, đang  chăm<br />chú với BlackBerry Curve 8900</span></span></p>\r\n<p style="text-align: center;"><img class="border_img" src="images/news/0610/jessica-alba_blackberry.jpg" border="0" /><br /><span style="color: #888888;">Mỹ nhân Jessica Alba đang cười  rất tươi cùng BlackBerry Curve 8900</span></p>\r\n<p style="text-align: center;"><span style="color: #888888;"><img class="border_img" src="images/news/0610/natalie-portman-blackberry.jpg" border="0" /><br /></span><span style="color: #888888;"><span style="font-family: arial,helvetica,sans-serif;">Natalie Portman, nữ vương Amidala, nghị   viên Amidala của nền Cộng Hòa<br />trong Star War, trên tay cô là   BlackBerry Curve 8900</span></span></p>\r\n<p style="text-align: center;"><span style="color: #888888;"><span style="font-family: arial,helvetica,sans-serif;"><img class="border_img" src="images/news/0610/gerad-butler-blackberry.jpg" border="0" /><br /></span></span><span style="color: #888888;"><span style="font-family: arial,helvetica,sans-serif;">“Vua Leonidas” của 300<em><em> </em></em>,  Gerad J.  Butler, chăm chú với BlackBerry Pearl</span></span></p>\r\n<p style="text-align: center;"><span style="color: #888888;"><span style="font-family: arial,helvetica,sans-serif;"><img class="border_img" src="images/news/0610/paris-hilton-blackberry.jpg" border="0" /><br /></span></span><span style="color: #888888;"><span style="font-family: arial,helvetica,sans-serif;">Trên tay "cô nàng tiệc tùng" </span></span><span style="color: #888888;"><span style="font-family: arial,helvetica,sans-serif;">Paris Hilton</span></span><span style="color: #888888;"><span style="font-family: arial,helvetica,sans-serif;"> là BlackBerry Pearl 8130 Verizon</span></span> <span style="color: #888888;">màu hồng<br />Ảnh: Exposay.com</span></p>\r\n<p style="text-align: center;"><img class="border_img" src="images/news/0610/beyonce-jayz-blackberry.jpg" border="0" /><br /><span style="color: #888888;">Rapper Jay Z và ca sĩ Beyonce  đang xem tin nhắn trên BlackBerry Bold</span></p>\r\n<p style="text-align: center;"><span style="color: #888888;"><img class="border_img" src="images/news/0610/sienna-miller-blackberry.jpg" border="0" /><br /></span><span style="color: #888888;">Ngôi sao Sienna Miller tươi  cười cùng BlackBerry Curve</span></p>\r\n<p style="text-align: center;"><span style="color: #888888;"><img class="border_img" src="images/news/0610/halle-berry-blackberry.jpg" border="0" /><br /></span><span style="color: #888888;"><span style="color: #888888;">Miêu nữ Halle Berry và BlackBerry Curve 8900 - Ảnh: Just  Jarrred</span></span></p>\r\n<p style="text-align: center;"><span style="color: #888888;"><span style="color: #888888;"><img class="border_img" src="images/news/0610/lohan-blackberry.jpg" border="0" /><br /></span></span><span style="color: #888888;">Linsay  Lohan cũng song hành cùng BlackBerry 8900</span></p>\r\n<p style="text-align: center;"><span style="color: #888888;"><img class="border_img" src="images/news/0610/hilary-duff-blackberry.jpg" border="0" /><br /></span><span style="color: #888888;">Hilary Duff - một fan hâm mộ của BlackBerry 8700 giống Barack Obama</span></p>\r\n<p style="text-align: center;"><img class="border_img" src="images/news/0610/britney_spears_blackberry.jpg" border="0" /><br /><span style="color: #888888;">BlackBerry Curve Sunset trên tay công chúa nhạc Pop một thời Britney Spears</span></p>\r\n<p style="text-align: right;"><span style="color: #888888;"><strong><span style="color: #5b5b5b;">BlackBerry Sài Gòn</span></strong><br /></span></p>', 1, 1, 0, 5, '2010-06-27 13:45:24', 62, '', '2010-07-01 17:28:46', 62, 0, '0000-00-00 00:00:00', '2010-06-27 13:45:24', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 41, 0, 2, '', '', 0, 229, 'robots=\nauthor='),
(74, 'Bảo hành', 'bao-hanh', '', '<p><img src="images/bbs/repair_welcome.png" border="0" /></p>\r\n<p><strong>Điều kiện bảo hành:</strong></p>\r\n<p>Sản phẩm do <strong>BlackBerry Sài Gòn | BBSaigon.com</strong> bán ra sẽ được bảo hành khi sử dụng trong điều kiện bình thường và gặp phải khiếm khuyết trong quá trình sản xuất với thời hạn được ghi rõ trên Phiếu bảo hành. Đây là hình thức bảo hành miễn phí (ngoại trừ phí vận chuyển và chi phí phát sinh khác). Chúng tôi chỉ bảo hành cho khách hàng đầu tiên với những điều khoản được nêu ra dưới đây:</p>\r\n<p>1. Phiếu bảo hành phải ghi đầy đủ tên và địa chỉ người mua, chủng loại sản phẩm, số sêri, ngày mua, thời hạn bảo hành, tên và địa chỉ nơi bán.</p>\r\n<p>2. Phiếu bảo hành sẽ không còn giá trị nếu như sản phẩm bị hư hỏng do tai nạn, thiên tai, thời tiết. Điều kiện bảo quản kém, để máy nơi bụi bặm, ẩm mốc, lửa, nhiệt, nước, hơi nước, cát, sử dụng không đúng chỉ dẫn. Quay phim, chụp ảnh trực diện với nguồn sáng quá mạnh hoặc với mặt trời. Máy không dán tem của <strong>BBSaigon.com</strong>. Tem bị bong tróc hoặc quý khách đã đưa đi sửa ở nới khác.</p>\r\n<p>3. Phiếu bảo hành không hiệu lực với phụ kiện kèm theo sản phẩm như pin, sạc, dây cáp, bóng đèn và những phụ kiện có số sêri khác với sản phẩm.</p>\r\n<p><strong> </strong></p>\r\n<p>4. Các lỗi như điểm chết màn hình (LCD) sẽ không được bảo hành vì các lỗi này có thể xuất hiện trong quá trình sử dụng sản phẩm<strong>.</strong></p>\r\n<p><strong>Cam kết của BBSaigon.com:</strong></p>\r\n<p><strong> </strong></p>\r\n<p>Chúng tôi cam kết bán ra cho quý khách những loại điện thoại BlackBerry chính hãng, tất cả đều mới 100% và có dán tem niêm phong với giá cả cạnh tranh và cập nhật thường xuyên, tránh cho quý khách mua phài sản phẩm giá cao hay kém chất lượng<strong>.</strong></p>\r\n<p><strong> </strong></p>\r\n<p>Đối với các loại phụ kiện đi kèm máy như pin, sạc, cáp chúng tôi sẽ dán tem bảo đảm nhằm cam kết về chất lượng. Đây là một vấn đề rất quan trọng mà quý khách rất ít chú ý khi mua máy mặc dù pin chính hãng có giá rất cao so với pin nhái giả hiệu.</p>\r\n<p>Chúng tôi rất hiểu sự băn khoăn của quý khách khi bỏ tiền ra mua các sản phẩm có giá cao vì có quá nhiều cửa hàng với các phương thức kinh doanh khác nhau, với những mục tiêu khác nhau. Qua những cam kết trên, chúng tôi muốn khẳng định phương châm kinh doanh của chúng tôi là:</p>\r\n<p style="text-align: center;">"SẢN PHẨM CHÍNH HÃNG - CHẤT LƯỢNG BẢO ĐẢM - GIÁ CẢ CẠNH TRANH - HẬU MÃI CHU ĐÁO"<strong> </strong></p>', '', 0, 0, 0, 0, '2010-06-29 01:49:18', 62, '', '2010-07-08 09:15:43', 62, 0, '0000-00-00 00:00:00', '2010-06-29 01:49:18', '0000-00-00 00:00:00', '', '', 'show_title=0\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=0\nshow_modify_date=0\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 17, 0, 1, '', '', 0, 264, 'robots=\nauthor='),
(75, 'Bảo Hàng', 'bao-hang', '', '<p><strong>Tìm hiểu sản phẩm - Liên hệ  mua hàng:<br /><br /></strong>Xem thông tin sản phẩm Quý khách đang quan tâm  trên trang web <strong>BBsaigon.com<br /><br /></strong></p>', '', -2, 0, 0, 0, '2010-06-29 01:49:18', 62, '', '0000-00-00 00:00:00', 0, 0, '0000-00-00 00:00:00', '2010-06-29 01:49:18', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 1, 0, 0, '', '', 0, 0, 'robots=\nauthor='),
(76, 'ettetew', 'ettetew', '', '<p><strong>Việc dùng BlackBerry để truy cập Internet, dùng tin nhắn tức thời (chát chít...)...đã thành hiện thực với các mạng GPRS tại Việt Nam ( ba nhà mạng Vinaphone, Mobifone và Viettel).</strong></p>', '', -2, 1, 0, 4, '2010-06-30 08:22:50', 62, '', '2010-06-30 19:12:49', 62, 0, '0000-00-00 00:00:00', '2010-06-30 08:22:50', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 4, 0, 0, '', '', 0, 19, 'robots=\nauthor='),
(80, 'Cách chụp màn hinh BlackBerry', 'cach-chup-man-hinh-blackberry', '', '<p><strong>Đôi khi bạn muốn chụp màn hình Blackberry để gửi cho bạn bè, để hướng dẫn cho khách hàng... Capture It là phần mềm rất nhỏ gọn nhưng sẽ hữu ích cho bạn trong trường hợp này.</strong></p>\r\n<p>Có một số trường hợp chắc hẳn bạn muốn chụp hình lại màn hình Blackberry của bạn, ví dụ bạn muốn chụp hình lại để làm bài hướng dẫn, chụp hình lại tin nhắn... để gửi cho người thân, khách hàng... Có nhiều chương trình cho phép bạn làm điều này, Capture It là một phần mềm nhỏ gọn (chỉ 13.1 KB) giúp bạn có thể chụp hình màn hình chiếc<a href="http://www.vienthongnam.com/"> </a>Blackberry của bạn ngay trên điện thoại . Bạn sẽ không cần phải sử dụng đến dây cable hay máy tính để có thể chụp hình màn hình Blackberry rất dễ dàng.</p>\r\n<p>Để cài đặt phần mềm này,  Blackberry của bạn phải sử dụng OS 4.3 hoặc cao hơn, bạn có thể cài đặt trực tiếp <a href="index.php?option=com_products&amp;controller=download&amp;task=download&amp;id=21"><span style="color: #3366cc;">tại đây</span></a></p>\r\n<p>Phần mềm Capture It được tích hợp trực tiếp vào Menu của Blackberry, tất cả những gì bạn cần làm là chọn bấm menu, chọn Capture It tại thời điểm bạn muốn chụp. Blackberry của bạn sẽ rung khoảng 1 giây để báo cho bạn thao tác chụp màn hình đã thành công. File hình tạo ra sẽ được lưu trong thư mục hình mặc định (Thẻ nhớ/Blackberry/Pictures) với định dạng phổ biến .jpg</p>\r\n<p><strong>Vài hình ảnh minh họa:</strong></p>\r\n<p style="text-align: center;"><img class="border_img" src="images/news/0610/blackberry-capture-1.jpg" border="0" /></p>\r\n<p style="text-align: center;"><img class="border_img" src="images/news/0610/blackberry-capture-2.jpg" border="0" /><br /><span style="color: #888888;">Chức năng Capture được tích hợp ngay trong menu</span></p>\r\n<p>Bạn chú ý là khi cài đặt và lần đầu sử dụng nếu Blackberry của bạn hiện ra bảng thông báo thì bạn stick vào tất cả các ô và chọn Allow. Chúc thành công!</p>\r\n<p style="text-align: right;"><strong>BlackBerry Sài Gòn</strong> (Sưu tầm)</p>', '', 1, 1, 0, 4, '2010-07-03 11:35:39', 62, '', '2010-10-04 04:18:59', 82, 0, '0000-00-00 00:00:00', '2010-07-03 11:35:39', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 10, 0, 4, 'Test', '', 0, 20, 'robots=\nauthor='),
(81, 'Cách cài đặt Document To Go - Ứng dụng văn phòng cho Blackberry', 'cach-cai-dat-document-to-go-ung-dung-van-phong-cho-blackberry', '', '<p><strong>Hướng dẫn cài đặt và sử dụng bộ Document2Go để đọc file Word, Excel và PDF ngay trên Blackberry của bạn. Hình ảnh minh họa chi tiết, download miễn phí, thao tác đơn giản để sử dụng như trên máy tính.</strong></p>\r\n<p>Chiếc điện thoại Blackberry được nhiều người biết đến bởi những tính năng ưu việt của nó so với những dòng điện thoại thông dụng khác hiện nay, tuy nhiên, để làm quen với Blackberry và để chiếc điện thoại Blackberry phát huy đúng “sức mạnh” của nó, chúng ta cần phải tìm hiểu khá nhiều về chức năng bên trong. Được gọi là dòng điện thoại dành cho doanh nhân, vì thế ứng dụng văn phòng là một điểm mạnh của chiếc điện thoại Blackberry.</p>\r\n<p>Những phần mềm văn phòng thông dụng dành cho BlackBerry như eOffice, Documents To Go.</p>\r\n<p><strong>Eoffice:</strong></p>\r\n<p>eOffice 4.5 - Thế giới văn phòng cho BlackBerry eOffice 4.5 từ Quickoffice hiện tại đã chính thức xuất hiện, đây là bộ ứng dụng văn phòng bản ngữ mới nhất của Dynoplex dành cho người dùng BlackBerry. Với 29,95 USD, người dùng BlackBerry sẽ được trang bị eOffice hiệu quả trong việc quản lí các Email đính kèm hay thiết tạo các tập dữ liệu văn phòng khi không ở nơi làm việc hoặc ngồi trên máy tính.</p>\r\n<p>Thông qua eOffife 4.5, người dùng có thể dễ dàng truy nhập và hiển thị các tài liệu dạng Microsoft Word, Excel, Powerpoit, PDF và các file đồ họa có trong các định dạng media không khác gì so với việc thao tác chúng trên máy tính để bàn. Đồng thời, người dùng còn có khả năng sửa các tài liệu dạng Word hay Excel. Bên cạnh đó, eOffice còn bổ sung thêm tính năng fax hay in trực tiếp các tài liệu từ thiết bị BlackBerry một cách hoàn hảo. Chính vì lẽ đó, dù đang ở bất kì vị trí nào ta đều có thể tương tác được với các tài liệu quan trọng cho công việc của mình.</p>\r\n<p>Phần mềm này đồng thời bao gồm Google Docs và Spreadsheets, cho phép nhiều người dùng khác nhau cùng một lúc có thể sử dụng cộng tác trên cùng một dự án. eOffice 4.5 tương thích với các dòng điện thoại chạy BlackBerry 4.5 hoặc các hệ điều hành trước đó.</p>\r\n<p style="text-align: center;"><img class="border_img" src="images/news/0610/eoffice.jpg" border="0" /></p>\r\n<p>Để đặt mua bộ phần mềm này, bạn đọc quan tâm có thể ghé thăm <a href="http://www.dynoplex.com" target="_blank"><span style="color: #3366cc;">www.dynoplex.com</span></a></p>\r\n<p>Thế nhưng do dung lượng file cài của Eoffice khá nặng, nên chúng tôi xin được đề cập đến phần mềm hữu dụng và thân thiện Document To Go.</p>\r\n<p><strong>Document To Go:</strong></p>\r\n<p>Là một phần mềm rất hay và đặc biệt từ khi ra đời nó đã đưa Blackberry lên một tầm cao mới về tiện ích sử dụng và đặc biệt là cho văn phòng trong khi dùng Blackberry.</p>\r\n<p>Để sử dụng được tốt phần mềm này thì em Blackberry của các bạn nên cài bản OS 4.5 trở lên.</p>\r\n<p>Hiện nay đã có bản Document To Go 1.05 active key OFFLINE (nghĩa là nếu có key thì cài được trên các máy). Các bạn có thể download Document To Go 1.005.</p>\r\n<p>Sau khi download, bạn giải nén và dùng BDM để cài cho em Blackberry của bạn. Chúng tôi xin nhắc các bạn rằng, sau khi up rom 4.5 cho điện thoại Blackberry của bạn, các bạn nên remove bản Document To Go có sẵn trong OS 4.5, vì nó không tự động replace đâu.</p>\r\n<p><strong>Sau đây là một vài hình ảnh sau khi cài Doc2Go:</strong></p>\r\n<p style="text-align: center;"><img class="border_img" src="images/news/0610/doc2go-1.jpg" border="0" /></p>\r\n<p>Trong Doc2Go gồm có Word , Slide và Sheet (Excel):</p>\r\n<p style="text-align: center;"><img class="border_img" src="images/news/0610/doc2go-2.jpg" border="0" /></p>\r\n<p>Sau khi cài xong,chạy chương trình rùi vào Menu chọn *Active… nhập reg no. và active code:</p>\r\n<p style="text-align: center;"><img class="border_img" src="images/news/0610/doc2go-3.jpg" border="0" /></p>\r\n<p style="text-align: center;"><img class="border_img" src="images/news/0610/doc2go-4.jpg" border="0" /></p>\r\n<p style="text-align: center;"><img class="border_img" src="images/news/0610/doc2go-5.jpg" border="0" /></p>\r\n<p style="text-align: center;"><img class="border_img" src="images/news/0610/doc2go-6.jpg" border="0" /></p>\r\n<p style="text-align: center;"> </p>\r\n<p style="text-align: center;"><img class="border_img" src="images/news/0610/doc2go-7.jpg" border="0" /></p>\r\n<p>Nhập xong là dùng được ngay. Chúc thành công!</p>\r\n<p><strong>Sau đây là một vài thao tác cơ bản, mong các bạn trao đổi thêm:</strong></p>\r\n<p>Mẹo: để sử dụng chức năng nào đó chỉ cần bấm TW + Phím đầu chức năng đó là được. Ví dụ Undo: Menu (bấm TW) + bấm U</p>\r\n<p><strong>Một vài thao tác chỉnh sửa khi soạn thảo văn bản văn phòng cho Blackberry:</strong></p>\r\n<p>+ Undo: menu -&gt; Undo</p>\r\n<p>+ Cách dịch chuyển con trỏ (pointview) trong soạn thảo:</p>\r\n<p>Sử dụng TW để dịch chuyển lên xuống</p>\r\n<p>ALT+TW để dịch chuyển trái phải</p>\r\n<p>+ Để có thể chỉnh sửa một văn bản trước tiên bật chế độ Edit mode:</p>\r\n<p>Menu --&gt; Edit Mode</p>\r\n<p>+ Chọn range cần chỉnh sửa định dạng:</p>\r\n<p>Dịch chuyển pointview đến vùng cần chọn -&gt; Alt + Num +TW</p>\r\n<p>+ Format một vùng chọn:</p>\r\n<p>Range -&gt; Format: Bold: đậm</p>\r\n<p>Italic: in nghiêng</p>\r\n<p>Underline: kẽ chân</p>\r\n<p>Font: định dạng font chữ</p>\r\n<p>Paragraph: định dạng đoạn văn bản</p>\r\n<p>Bullets &amp; Numberring: hoa thị và mục số đầu dòng</p>\r\n<p>Hyberlink: tạo siêu liên k ết</p>\r\n<p>Bookmark: đánh dấu trang văn bản cần theo dõi</p>\r\n<p>Increase Indent: tăng khoảng cách chữ</p>\r\n<p>Decrease Indent: giảm khoảng cách chữ</p>\r\n<p>....</p>\r\n<p>Còn nhiều thủ thuật khác đang chờ các bạn khám phá, và chúng tôi rất mong những góp ý từ chính bạn đối với chúng tôi.</p>\r\n<p style="text-align: right;"><strong>BlackBerry Sài Gòn</strong> (Sưu tầm)</p>', '', 1, 1, 0, 4, '2010-07-03 12:37:17', 62, '', '2010-07-08 08:17:59', 62, 0, '0000-00-00 00:00:00', '2010-07-03 12:37:17', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 13, 0, 3, 'Doc2Go', '', 0, 53, 'robots=\nauthor='),
(82, 'Documents To Go v2.0 - Giải pháp Office cho Blackberry', 'documents-to-go-v20-giai-phap-office-cho-blackberry', '', '<p><strong>Documents To Go v.2.0 phiên bản mới ứng dụng văn phòng cho Blackberry. Nhiều chức năng mới được cập nhật so với phiên bản cũ đang chờ bạn khám phá. </strong>Bộ phần mềm gồm Words To Go, Slideshow To Go, Sheet To Go và PDF To Go. Giúp bạn có thể sử dụng Word, xcel, Powerpoint, PDF trên điện thoại Blackberry của mình.</p>\r\n<p>Trong cuộc sống công nghệ, sự đổi mới, nâng cấp là điều luôn song hành cùng sự tiên tiến của công nghệ. Trong đó bao gồm cả điện thoại. Nhất là các dòng smartphone như Blackberry, HTC, Iphone... nói chung.</p>\r\n<p>Về<a href="http://www.vienthongnam.com/"> </a>Blackberry nói riêng, dòng smartphone dành cho doanh nhân được biết đến với những ứng dụng thực tế nhất như lướt web, chat, mail, và tất nhiên không thể thiếu ứng dụng văn phòng cho Blackberry.</p>\r\n<p>Bộ ứng dụng văn phòng hay còn gọi là bộ Office cho Blackberry được nhiều người biết đến nhất và được sử dụng nhiêu nhất đó là Documents To Go.</p>\r\n<p>Kế tiếp phiên bản Doc2Go version 1.005,  xin giới thiệu với các bạn Document To Go Phiên bản mới: Doc2Go v2.0 - Giải pháp Office cho Blackberry</p>\r\n<p style="text-align: center;"><img class="border_img" src="images/news/0610/doc2go-v.2.0-1.jpg" border="0" /></p>\r\n<p>Xin giới thiệu với các bạn Document To Go Phiên bản mới: Doc2Go v2.0 - Giải pháp Office cho Blackberry.</p>\r\n<p>Với nhiều cải tiến mới của bộ ứng dụng văn phòng Doc2Go v2.0 đang chờ các bạn tìm hiểu và khám phá.</p>\r\n<p>Ở đây xin nhắc đến một đặc điểm mới, đó là về PDF To Go v2.0 này, khi dùng PDF 2Go v2.0 này giúp bạn không bị "mất dấu" khi đọc tài liệu nếu bạn thoát ra đột ngột. Và còn rất nhiều tính năng đang chờ bạn khám phá. Mong rằng điận thoại Blackberry của bạn sẽ có ích hơn và tiện dụng hơn với bộ Document To Go v2.0 này.</p>\r\n<p>Để cài đặt được chương trình Doc2Go thì Blackberry của bạn phải được cài đặt phiên bản OS (ROM) 4.5 hoặc cao hơn.</p>\r\n<p style="text-align: left;"><strong>Sau đây là 1 số hình ảnh về Bộ Office Doc2Go v2.0:</strong></p>\r\n<p style="text-align: center;"><img src="images/news/0610/doc2go-v.2.0-2.jpg" border="0" /></p>\r\n<p style="text-align: center;"><img src="images/news/0610/doc2go-v.2.0-3.jpg" border="0" /></p>\r\n<p style="text-align: center;"><img src="images/news/0610/doc2go-v.2.0-4.jpg" border="0" /></p>\r\n<p style="text-align: center;"><img src="images/news/0610/doc2go-v.2.0-5.jpg" border="0" /></p>\r\n<p style="text-align: center;"><img src="images/news/0610/doc2go-v.2.0-6.jpg" border="0" /></p>\r\n<p>Bạn cũng lưu ý là để có thể tạo/chỉnh sửa file Word, Excel hoặc sử dụng PDF thì ban cần active (kích hoạt) cho chương trình. Cách kích hoạt thì bạn tham khảo tại bài viết cho phiên bản <a href="chia-se-kinh-nghiem/81-cach-cai-dat-document2go-ung-dung-van-phong-cho-blackberry.html"><span style="color: #3366cc;">Doc2Go version 1.005.</span></a></p>\r\n<p align="right">BlackBerry Sài Gòn (Sưu tầm)</p>', '', 1, 1, 0, 4, '2010-07-03 13:25:49', 62, '', '2010-07-03 19:52:16', 62, 0, '0000-00-00 00:00:00', '2010-07-03 13:25:49', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 8, 0, 2, 'doc2go', '', 0, 40, 'robots=\nauthor='),
(83, 'Dùng Jivetalk để chat Yahoo! Messenger trên BlackBerry', 'dung-jivetalk-de-chat-yahoo-messenger-tren-blackberry', '', '<p><strong>Trong các phần mềm để chát Yahoo! Messenger thì Jivetalk được đánh giá rất cao bởi giao diện đẹp, tốc độ truy cập nhanh và khá tiết kiệm pin khi sử dụng</strong>. Phí bản quyền của của jivetalk là 9.99 $cho Device License (chỉ dùng trên một máy và không chuyển sang máy khác được) hoặc 14.99 $ cho User License (có thể chuyển key từ máy BlackBerry này sang BlackBerry khác).</p>\r\n<p>Download bản dùng thử <a href="http://www.beejive.com/download/blackberry/" target="_blank"><span style="color: #3366cc;">tại đây</span></a></p>\r\n<p>Khi download bạn chọn đúng dòng BlackBerry và phiên bản OS bạn đang dùng dụng rồi chọn “I accept the License Agreement” --&gt; Continue để download phần mềm về máy tính. Sau đó bạn cài đặt chương trình như bình thường.</p>\r\n<p style="text-align: center;"><img class="border_img" src="images/news/0610/jivetalk-1.jpg" border="0" /><br /><span style="color: #888888;">Khi cài đặt thành công sẽ thấy icon của Jivetalk xuất hiện</span></p>\r\n<p style="text-align: center;"><img class="border_img" src="images/news/0610/jivetalk-2.jpg" border="0" /><br /><span style="color: #888888;">Giao diện khi chạy chương trình. Để lấy được keydùng thử<br />bạn bấm vào nút "Get a trial license"</span></p>\r\n<p style="text-align: center;"><img class="border_img" src="images/news/0610/jivetalk-3.jpg" border="0" /><br /><span style="color: #888888;">Key đã được lấy thành công</span></p>\r\n<p style="text-align: center;"><img class="list_content" src="images/news/0610/jivetalk-4.jpg" border="0" /><br /><span style="color: #888888;">Chọn chuyển sang Yahoo! Messenger trong mục<br />Network ( Select One)</span></p>\r\n<p style="text-align: center;"><img class="border_img" src="images/news/0610/jivetalk-5.jpg" border="0" /><br /><span style="color: #888888;">Nhập User/Password trên YH của bạn vào đây</span></p>\r\n<p style="text-align: center;"><img class="border_img" src="images/news/0610/jivetalk-6.jpg" border="0" /><br /><span style="color: #888888;">Rồi bấm Menu, chọn Log In</span></p>\r\n<p style="text-align: center;"><img class="border_img" src="images/news/0610/jivetalk-7.jpg" border="0" /><br /><span style="color: #888888;">Khi chương trình đang Log In</span></p>\r\n<p style="text-align: center;"><img class="border_img" src="images/news/0610/jivetalk-8.jpg" border="0" /><br /><span style="color: #888888;">Thông báp User hay Password không đúng</span></p>\r\n<p style="text-align: center;"><img class="border_img" src="images/news/0610/jivetalk-9.jpg" border="0" /><br /><span style="color: #888888;">Để nhập lại User và Password thì bấm Menu --&gt; Expand</span></p>\r\n<p style="text-align: center;"><img class="border_img" src="images/news/0610/jivetalk-10.jpg" border="0" /><br /><span style="color: #888888;">Bấm Menu --&gt; Edit Account để sửa thông tin tài khoản</span></p>\r\n<p style="text-align: center;"><img class="border_img" src="images/news/0610/jivetalk-11.jpg" border="0" /><br /><span style="color: #888888;">Log In thành công</span></p>\r\n<p style="text-align: center;"><img class="border_img" src="images/news/0610/jivetalk-12.jpg" border="0" /><br /><span style="color: #888888;">Test thử</span></p>\r\n<p style="text-align: center;"><img class="border_img" src="images/news/0610/jivetalk-13.jpg" border="0" /><br /><span style="color: #888888;">Để tắt Jivetalk, hãy về giao diện chính rồi bấm Menu chọn<br />Shutdown, nếu không thì Jivetalk sẽ vẫn chạy ngầm.</span></p>\r\n<p style="text-align: right;"><strong>BlackBerry Sài Gòn</strong></p>', '', 1, 1, 0, 4, '2010-07-03 14:21:32', 62, '', '2010-10-04 04:18:40', 82, 0, '0000-00-00 00:00:00', '2010-07-03 14:21:32', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 16, 0, 1, 'Test', '', 0, 67, 'robots=\nauthor=');
INSERT INTO `hdt_content` (`id`, `title`, `alias`, `title_alias`, `introtext`, `fulltext`, `state`, `sectionid`, `mask`, `catid`, `created`, `created_by`, `created_by_alias`, `modified`, `modified_by`, `checked_out`, `checked_out_time`, `publish_up`, `publish_down`, `images`, `urls`, `attribs`, `version`, `parentid`, `ordering`, `metakey`, `metadesc`, `access`, `hits`, `metadata`) VALUES
(84, 'Xu hướng thời trang thu 2011 đang nóng từng ngày', 'xu-huong-thoi-trang-thu-2011-dang-nong-tung-ngay', '', '<div>Dù là kết hợp cho một ngày làm việc tại chốn công sở hay dạo phố cùng bè bạn, những dáng quần tây, quần kaki xắn ống và quần lửng… không thể bị lãng quên trong tủ đồ của bạn với một ngày thu tuyệt  vời. Nếu tinh ý, bạn sẽ có những phong cách mới cho mình chính từ những  chiếc quần và kết hợp cùng những kiểu áo cũ, lâu chưa dùng đến. Điểm nhấn cho chiếc quần còn nằm ở một vài phụ kiện, hay chính những thiết kế tạo đường nét, dáng quần hợp và vừa vặn với phom người của bạn.</div>\r\n<div>\r\n', '\r\n</div>\r\n<p>Tin tức <span><a href="http://tintucthoitrang.com/" target="_blank" title="Thoi trang">thời trang</a></span> xin gửi đến bạn đọc những dáng quần nên lựa chọn để kết hợp trong những ngày thu, thoải mái trong <span><a href="http://tintucthoitrang.com/" target="_blank" title="trang phục">trang phục</a></span> và vẫn đủ tự tin với một vài điểm nhấn kết hợp, dành cho cá tính của riêng mỗi bạn gái:</p>\r\n<p>Quần cạp cao, cạp thun ôm eo:</p>\r\n<p>Kiểu quần này dành cho những bạn gái sở hữu những <span><a href="http://tintucthoitrang.com/phu-kien/trang-suc-thoi-trang" target="_blank" title="vòng">vòng</a></span> eo khá nhỏ, gọn và có chiều cao tương đối trở lên. Trẻ trung, hiện đại  và rất thoải mái trong những cách phối hợp. Quần cạp cao giờ đây chiều  lòng cả những cô gái khó tính nhất với thiết kế kẻ li mảnh, li gập cho  đến những dáng suôn, mảnh…</p>\r\n<p>Tạo điểm nhấn:</p>\r\n<p>- Không nên dùng dây lưng, cơ bản của quần cạp cao bao gồm những đoạn  cạp quần bản to, thun ôm gọn. Tuyệt vời nhất là một chiếc sơmi khoét  tay, hay sơmi bèo nhẹ cắm thùng.</p>\r\n<p>- Kết hợp với <span><a href="http://tintucthoitrang.com/phu-kien/thoi-trang-giay-dep" target="_blank" title="giày">giày</a></span> cao gót thanh mảnh, sandal đế hộp…</p>\r\n<p><img src="http://img.2sao.vietnamnet.vn/2010/09/09/21/29/quan1.jpg" border="0" /></p>\r\n<p><img src="http://img.2sao.vietnamnet.vn/2010/09/09/21/29/quan2.jpg" border="0" /></p>\r\n<p><img src="http://img.2sao.vietnamnet.vn/2010/09/09/21/29/quan3.jpg" border="0" /></p>\r\n<p><img src="http://img.2sao.vietnamnet.vn/2010/09/09/21/30/quan8.jpg" border="0" /></p>\r\n<p><img src="http://img.2sao.vietnamnet.vn/2010/09/09/21/30/quan10.jpg" border="0" /></p>\r\n<p><img src="http://img.2sao.vietnamnet.vn/2010/09/09/21/30/quan9.jpg" border="0" /></p>\r\n<p> </p>\r\n<div>Quần xếp li dáng đứng, xắn ống:</div>\r\n<p>Một cô gái công sở năng động, đầy sức sống sẽ khiến các chàng trai  không thể rời mắt. Quần xếp li đã quá quen thuộc với các bạn gái từ  những ngày đầu hè. Nhưng vào mùa thu năm nay, kiểu dáng suôn, li phá  cách nhiều và dày gấp hơn… Hay cá tính với cách xắn ống tạo dáng lửng,  cũng là cách tạo điểm nhấn, pha trộn giữa cái cũ và mới, khiến bạn hấp  dẫn và được “để mắt” tới nhiều hơn!</p>\r\n<p>Tạo điểm nhấn:</p>\r\n<p>- Với những bạn gái dáng cao, nên kết hợp cách xắn ống, tạo dáng lửng  đi cùng giầy cao gót và những loại áo sơmi đa dạng (tránh quá rườm rà)</p>\r\n<p>- Một chiếc dây lưng lại trở nên hữu ích cho những dáng quần li, bản  dây lưng to hay nhỏ còn phụ thuộc vào dáng quần túi phồng hay suôn đứng,  bạn có thể kết hợp và tạo ra những phong cách khác nhau.</p>\r\n<p><img src="http://img.2sao.vietnamnet.vn/2010/09/09/21/29/quan6.jpg" border="0" /></p>\r\n<p><img src="http://img.2sao.vietnamnet.vn/2010/09/09/21/29/quan5.jpg" border="0" /></p>\r\n<p><img src="http://img.2sao.vietnamnet.vn/2010/09/09/21/29/quan4.jpg" border="0" /></p>\r\n<p><img src="http://img.2sao.vietnamnet.vn/2010/09/09/21/26/ngo2.jpg" border="0" /></p>\r\n<p><img src="http://img.2sao.vietnamnet.vn/2010/09/09/21/26/ngo5.jpg" border="0" /></p>\r\n<p><img src="http://img.2sao.vietnamnet.vn/2010/09/09/21/26/ngo1.jpg" border="0" /></p>\r\n<p><img src="http://img.2sao.vietnamnet.vn/2010/09/09/21/26/ngo4.jpg" border="0" /></p>\r\n<p> </p>\r\n<div>3. Quần lửng ôm, xếp li:</div>\r\n<p>Năng động và trẻ trung, quần lửng vẫn “hoành hành” với <span><a href="http://tintucthoitrang.com/" target="_blank" title="Thoi trang">thời trang</a></span> vào những ngày thu mát mẻ và dịu nhẹ. Bạn đừng vội gom chúng vào những <span><a href="http://tintucthoitrang.com/" target="_blank" title="trang phục">trang phục</a></span> mùa hè và vội cất đi nhé! Kết hợp với áo thun ôm, kèm thêm gi-lê hay  những chiếc khăn cổ nhỏ gọn là bạn đã có thêm một bộ đồ làm “điệu” cho  những ngày đi chơi, bước xuống phố đầy tự tin!</p>\r\n<p>Tạo điểm nhấn:</p>\r\n<p>- Vẫn là cách tinh ý trộn những tông màu tương phản cho quần và áo</p>\r\n<p>- Phụ kiện không thể thiếu cho một phong cách năng động thế này: mũ len mỏng, khăn hay <span><a href="http://tintucthoitrang.com/phu-kien/thoi-trang-tui-xach" target="_blank" title="túi xách">túi xách</a></span> bản to</p>\r\n<p>- Giầy <span><a href="http://tintucthoitrang.com/phu-kien/thoi-trang-giay-dep" target="_blank" title="dép">dép</a></span> cũng rất dễ kết hợp: từ sandal đế bệt, <span><a href="http://tintucthoitrang.com/phu-kien/thoi-trang-giay-dep" target="_blank" title="giày">giày</a></span> cao gót cho đến dáng <span><a href="http://tintucthoitrang.com/phu-kien/thoi-trang-giay-dep" target="_blank" title="giày">giày</a></span> búp bê…</p>\r\n<p><img src="http://img.2sao.vietnamnet.vn/2010/09/09/21/27/ngo7.jpg" border="0" /></p>\r\n<p><img src="http://img.2sao.vietnamnet.vn/2010/09/09/21/27/ngo8.jpg" border="0" /></p>\r\n<p><img src="http://img.2sao.vietnamnet.vn/2010/09/09/22/20/105quanxepli18.jpg" border="0" /></p>\r\n<p><img src="http://img.2sao.vietnamnet.vn/2010/09/09/22/20/105quanxepli19.jpg" border="0" /></p>\r\n<p><img src="http://img.2sao.vietnamnet.vn/2010/09/09/22/20/105quanxepli20.jpg" border="0" /></p>\r\n<p><img src="http://img.2sao.vietnamnet.vn/2010/09/09/22/20/1008181003.jpg" border="0" /></p>\r\n<p><img src="http://img.2sao.vietnamnet.vn/2010/09/09/22/20/1008181011.jpg" border="0" /></p>\r\n<p><img src="http://img.2sao.vietnamnet.vn/2010/09/09/22/20/105quanxepli13.jpg" border="0" /></p>\r\n<p><img src="http://img.2sao.vietnamnet.vn/2010/09/09/22/20/105quanxepli15.jpg" border="0" /></p>\r\n<p><img src="http://img.2sao.vietnamnet.vn/2010/09/09/22/20/105quanxepli14.jpg" border="0" /></p>\r\n<p> </p>\r\n<p style="text-align: right;"><strong>nguồn: tintucthoitrng.com</strong></p>', 1, 1, 0, 6, '2010-06-08 21:26:34', 62, '', '2010-10-11 07:14:05', 82, 0, '0000-00-00 00:00:00', '2010-06-08 21:26:34', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 1, 0, 8, 'RIM', '', 0, 31, 'robots=\nauthor='),
(85, 'Cách phối đồ độc đáo chào thu', 'cach-phoi-do-doc-dao-chao-thu', '', '<div>Mùa thu được coi là thời tiết lý tưởng  nhất trong năm để bạn có thể diện những bộ cánh phối hợp từ <span><a href="http://tintucthoitrang.com/" target="_blank" title="trang phục">trang phục</a></span> của ngày hè và cả đông. Tùy theo tiết trời mát mẻ hay một chút se lạnh  vào buổi tối, bạn hãy sẵn sàng chuẩn bị những <span><a href="http://tintucthoitrang.com/" target="_blank" title="trang phục">trang phục</a></span> để bước ra  ngoài đầy tự tin và hoàn toàn gây ấn tượng với gu <span><a href="http://tintucthoitrang.com/" target="_blank" title="Thoi trang">thời trang</a></span> của mình,  dù là <span><a href="http://tintucthoitrang.com/" target="_blank" title="trang phục">trang phục</a></span> diện đến công sở hay dạo chơi cùng bạn bè…</div>\r\n<div>\r\n', '\r\n</div>\r\n<div><a href="http://img.2sao.vietnamnet.vn/2010/08/19/11/51/thu7.jpg" rel="lightbox[roadtrip]"><img src="http://img.2sao.vietnamnet.vn/2010/08/19/11/51/thu7.jpg" border="0" /></a><a href="http://img.2sao.vietnamnet.vn/2010/08/19/11/59/thu32.jpg" rel="lightbox[roadtrip]"><img src="http://img.2sao.vietnamnet.vn/2010/08/19/11/59/thu32.jpg" border="0" /></a></div>\r\n<div>2Sao xin  gửi tới bạn đọc một vài kiểu <span><a href="http://tintucthoitrang.com/" target="_blank" title="trang phục">trang phục</a></span> kết hợp tuyêt vời dành riêng  cho mùa thu và một vài lưu ý nhỏ để bạn luôn tự tin khi diện chúng dù ở  bất cứ nơi đâu:\r\n<p>1. Váy suông + áo vest tông sáng:</p>\r\n<p>Những  thiết kế váy suông khoét tay, cổ tròn… với những họa tiết kẻ  hay dáng  trơn đơn giản đã không còn xa lạ với các bạn nữ trong những  ngày hè. Ưu  điểm lớn nhất của kiểu váy này là sự thoải mái, nhẹ nhàng  từ những chất  liệu cho đến cách thiết kế. Chính vì vậy, trong những  ngày mát mẻ, bạn  có thể khoác thêm bên ngoài lớp áo khoác, áo vest trơn  với những gam màu  sáng, bắt mắt để tạo điểm nhấn chính cho trang phục…</p>\r\n<p>Lưu ý: Những  thiết kế vest mỏng, trơn đơn giản là lựa chọn tối ưu  nhất. Tránh chọn  những gam màu trầm, tối sẽ khiến bạn trở nên quá cứng  nhắc và phá hỏng  tổng thể, khiến chúng trở nên lộn xộn. Ngoài ra, những  điểm nhấn phụ  kiện như: hoa cài áo, nơ, <span><a href="http://tintucthoitrang.com/phu-kien" target="_blank" title="phụ kiện">phụ kiện</a></span>… cũng nên lược bớt.</p>\r\n</div>\r\n<div><a href="http://img.2sao.vietnamnet.vn/2010/08/19/11/51/thu4.jpg" rel="lightbox[roadtrip]"><img src="http://img.2sao.vietnamnet.vn/2010/08/19/11/51/thu4.jpg" border="0" /></a>\r\n<p><a href="http://img.2sao.vietnamnet.vn/2010/08/19/11/51/thu5.jpg" rel="lightbox[roadtrip]"><img src="http://img.2sao.vietnamnet.vn/2010/08/19/11/51/thu5.jpg" border="0" /></a></p>\r\n<p><a href="http://img.2sao.vietnamnet.vn/2010/08/19/11/51/thu6.jpg" rel="lightbox[roadtrip]"><img src="http://img.2sao.vietnamnet.vn/2010/08/19/11/51/thu6.jpg" border="0" /></a></p>\r\n<p><a href="http://img.2sao.vietnamnet.vn/2010/08/19/11/52/thu20.jpg" rel="lightbox[roadtrip]"><img src="http://img.2sao.vietnamnet.vn/2010/08/19/11/52/thu20.jpg" border="0" /></a></p>\r\n<p><a href="http://img.2sao.vietnamnet.vn/2010/08/19/11/52/thu19.jpg" rel="lightbox[roadtrip]"><img src="http://img.2sao.vietnamnet.vn/2010/08/19/11/52/thu19.jpg" border="0" /></a></p>\r\n<p><a href="http://img.2sao.vietnamnet.vn/2010/08/19/11/52/thu15.jpg" rel="lightbox[roadtrip]"><img src="http://img.2sao.vietnamnet.vn/2010/08/19/11/52/thu15.jpg" border="0" /></a></p>\r\n<p><a href="http://img.2sao.vietnamnet.vn/2010/08/19/11/52/thu16.jpg" rel="lightbox[roadtrip]"><img src="http://img.2sao.vietnamnet.vn/2010/08/19/11/52/thu16.jpg" border="0" /></a></p>\r\n<p><a href="http://img.2sao.vietnamnet.vn/2010/08/19/11/52/thu18.jpg" rel="lightbox[roadtrip]"><img src="http://img.2sao.vietnamnet.vn/2010/08/19/11/52/thu18.jpg" border="0" /></a></p>\r\n<p><a href="http://img.2sao.vietnamnet.vn/2010/08/19/11/52/thu11.jpg" rel="lightbox[roadtrip]"><img src="http://img.2sao.vietnamnet.vn/2010/08/19/11/52/thu11.jpg" border="0" /></a></p>\r\n<p><a href="http://img.2sao.vietnamnet.vn/2010/08/19/11/52/thu12.jpg" rel="lightbox[roadtrip]"><img src="http://img.2sao.vietnamnet.vn/2010/08/19/11/52/thu12.jpg" border="0" /></a></p>\r\n<p><a href="http://img.2sao.vietnamnet.vn/2010/08/19/11/52/thu13.jpg" rel="lightbox[roadtrip]"><img src="http://img.2sao.vietnamnet.vn/2010/08/19/11/52/thu13.jpg" border="0" /></a></p>\r\n<p><a href="http://img.2sao.vietnamnet.vn/2010/08/19/11/52/thu14.jpg" rel="lightbox[roadtrip]"><img src="http://img.2sao.vietnamnet.vn/2010/08/19/11/52/thu14.jpg" border="0" /></a></p>\r\n<p><a href="http://img.2sao.vietnamnet.vn/2010/08/19/11/51/thu7.jpg" rel="lightbox[roadtrip]"><img src="http://img.2sao.vietnamnet.vn/2010/08/19/11/51/thu7.jpg" border="0" /></a></p>\r\n<p><a href="http://img.2sao.vietnamnet.vn/2010/08/19/11/51/thu8.jpg" rel="lightbox[roadtrip]"><img src="http://img.2sao.vietnamnet.vn/2010/08/19/11/51/thu8.jpg" border="0" /></a></p>\r\n<p><a href="http://img.2sao.vietnamnet.vn/2010/08/19/11/52/thu10.jpg" rel="lightbox[roadtrip]"><img src="http://img.2sao.vietnamnet.vn/2010/08/19/11/52/thu10.jpg" border="0" /></a></p>\r\n<p><a href="http://img.2sao.vietnamnet.vn/2010/08/19/11/51/thu9.jpg" rel="lightbox[roadtrip]"><img src="http://img.2sao.vietnamnet.vn/2010/08/19/11/51/thu9.jpg" border="0" /></a></p>\r\n</div>\r\n<p>2. Áo, váy dáng dài + áo khoác lửng:</p>\r\n<div>Những  thiết kế gần giống với vest, nhưng khoác lửng sẽ dễ dàng  tăng điểm nhấn  và gam màu của áo, váy bên trong. Hơn nữa, khi kết hợp  cùng những tông  màu tươi, tạo độ tương phản rõ nét cho trang phục. Bạn  có thể tham khảo  những kiểu khoác với những họa tiết vải kẻ xước, vải  đính đá ở cổ và  khuỷu tay…</div>\r\n<div><a href="http://img.2sao.vietnamnet.vn/2010/08/19/11/50/thu1%20%282%29.jpg" rel="lightbox[roadtrip]"><img src="http://img.2sao.vietnamnet.vn/2010/08/19/11/50/thu1%20%282%29.jpg" border="0" /></a>\r\n<p><a href="http://img.2sao.vietnamnet.vn/2010/08/19/11/50/thu2.jpg" rel="lightbox[roadtrip]"><img src="http://img.2sao.vietnamnet.vn/2010/08/19/11/50/thu2.jpg" border="0" /></a></p>\r\n</div>\r\n<div><a href="http://img.2sao.vietnamnet.vn/2010/08/19/11/54/thu22lung.jpg" rel="lightbox[roadtrip]"><img src="http://img.2sao.vietnamnet.vn/2010/08/19/11/54/thu22lung.jpg" border="0" /></a>\r\n<p><a href="http://img.2sao.vietnamnet.vn/2010/08/19/11/55/thu21lung.jpg" rel="lightbox[roadtrip]"><img src="http://img.2sao.vietnamnet.vn/2010/08/19/11/55/thu21lung.jpg" border="0" /></a></p>\r\n<p><a href="http://img.2sao.vietnamnet.vn/2010/08/19/11/55/thu24.jpg" rel="lightbox[roadtrip]"><img src="http://img.2sao.vietnamnet.vn/2010/08/19/11/55/thu24.jpg" border="0" /></a></p>\r\n<p><a href="http://img.2sao.vietnamnet.vn/2010/08/19/11/55/thu23.jpg" rel="lightbox[roadtrip]"><img src="http://img.2sao.vietnamnet.vn/2010/08/19/11/55/thu23.jpg" border="0" /></a></p>\r\n<p><a href="http://img.2sao.vietnamnet.vn/2010/08/19/11/55/thu25.jpg" rel="lightbox[roadtrip]"><img src="http://img.2sao.vietnamnet.vn/2010/08/19/11/55/thu25.jpg" border="0" /></a></p>\r\n</div>\r\n<p>3. Kết hợp cùng áo gi-lê:</p>\r\n<div>Áo  gi-lê là kiểu trang mục đơn giản và rất dễ kết hợp trong mùa  thu. Một  lớp áo phông, áo dài tay bên trong… đều có thể tạo nên những  phong  cách rất riêng mà bạn có thể chọn lựa.</div>\r\n<p><a href="http://img.2sao.vietnamnet.vn/2010/08/19/11/58/thu27.jpg" rel="lightbox[roadtrip]"><img src="http://img.2sao.vietnamnet.vn/2010/08/19/11/58/thu27.jpg" border="0" /></a></p>\r\n<p><a href="http://img.2sao.vietnamnet.vn/2010/08/19/11/58/thu26.jpg" rel="lightbox[roadtrip]"><img src="http://img.2sao.vietnamnet.vn/2010/08/19/11/58/thu26.jpg" border="0" /></a></p>\r\n<p><a href="http://img.2sao.vietnamnet.vn/2010/08/19/11/58/thu28.jpg" rel="lightbox[roadtrip]"><img src="http://img.2sao.vietnamnet.vn/2010/08/19/11/58/thu28.jpg" border="0" /></a></p>\r\n<div>Một  chút bụi, hầm hố làm tăng thêm phong cách cho bạn. Kiểu trang  phục tông  trầm cùng chiếc gi-lê gam màu be nổi bật. Bạn cũng nên thử  một vài phụ  kiện đi kèm như mũ, bốt cổ cao và một vài loại <span><a href="http://tintucthoitrang.com/phu-kien/trang-suc-thoi-trang" target="_blank" title="vòng">vòng</a></span> bohemina kiểu dáng  dài, cổ điển đi kèm…</div>\r\n<p><a href="http://img.2sao.vietnamnet.vn/2010/08/19/11/59/thu30.jpg" rel="lightbox[roadtrip]"><img src="http://img.2sao.vietnamnet.vn/2010/08/19/11/59/thu30.jpg" border="0" /></a></p>\r\n<p><a href="http://img.2sao.vietnamnet.vn/2010/08/19/11/59/thu31.jpg" rel="lightbox[roadtrip]"><img src="http://img.2sao.vietnamnet.vn/2010/08/19/11/59/thu31.jpg" border="0" /></a></p>\r\n<div>Những  thiết kế áo gi-lê đính đá phần mặt trước, ở 2 bên thân áo  cũng rất đáng  được thử trong dịp thu này. Gợi ý nhỏ dành cho bạn là  kiểu <span><a href="http://tintucthoitrang.com/" target="_blank" title="quần">quần</a></span> legging, <span><a href="http://tintucthoitrang.com/" target="_blank" title="quần">quần</a></span> thun, jeans bó đi kèm áo dáng dài. Tất cả những <span><a href="http://tintucthoitrang.com/phu-kien" target="_blank" title="phụ kiện">phụ kiện</a></span> đi kèm như <span><a href="http://tintucthoitrang.com/phu-kien/thoi-trang-tui-xach" target="_blank" title="túi xách">túi xách</a></span>, <span><a href="http://tintucthoitrang.com/phu-kien/trang-suc-thoi-trang" target="_blank" title="vòng">vòng</a></span> tay và xăng-đan, <span><a href="http://tintucthoitrang.com/phu-kien/thoi-trang-giay-dep" target="_blank" title="giày">giày</a></span> cao gót… Hãy chắc chắn  rằng bạn sẽ tạo nên những tổng thể gam màu phù hợp. Đặc biệt là những  <span><a href="http://tintucthoitrang.com/phu-kien" target="_blank" title="phụ kiện">phụ kiện</a></span>…</div>\r\n<p><a href="http://img.2sao.vietnamnet.vn/2010/08/19/11/59/thu32.jpg" rel="lightbox[roadtrip]"><img src="http://img.2sao.vietnamnet.vn/2010/08/19/11/59/thu32.jpg" border="0" /></a></p>\r\n<p><a href="http://img.2sao.vietnamnet.vn/2010/08/19/16/30/198anhttthu.jpg" rel="lightbox[roadtrip]"><img src="http://img.2sao.vietnamnet.vn/2010/08/19/16/30/198anhttthu.jpg" border="0" /></a></p>\r\n<p><a href="http://img.2sao.vietnamnet.vn/2010/08/19/11/59/thu38.jpg" rel="lightbox[roadtrip]"><img src="http://img.2sao.vietnamnet.vn/2010/08/19/11/59/thu38.jpg" border="0" /></a></p>\r\n<p><a href="http://img.2sao.vietnamnet.vn/2010/08/19/11/59/thu37.jpg" rel="lightbox[roadtrip]"><img src="http://img.2sao.vietnamnet.vn/2010/08/19/11/59/thu37.jpg" border="0" /></a></p>\r\n<p><a href="http://img.2sao.vietnamnet.vn/2010/08/19/11/59/thu35.jpg" rel="lightbox[roadtrip]"><img src="http://img.2sao.vietnamnet.vn/2010/08/19/11/59/thu35.jpg" border="0" /></a></p>\r\n<p><a href="http://img.2sao.vietnamnet.vn/2010/08/19/11/59/thu36.jpg" rel="lightbox[roadtrip]"><img src="http://img.2sao.vietnamnet.vn/2010/08/19/11/59/thu36.jpg" border="0" /></a></p>\r\n<p> </p>\r\n<p style="text-align: right;"><strong>nguồn: tintucthoitrang.com</strong></p>', 1, 1, 0, 6, '2010-06-08 15:55:26', 62, '', '2010-10-12 06:42:01', 82, 0, '0000-00-00 00:00:00', '2010-06-08 15:55:26', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 3, 0, 7, 'RIM', '', 0, 1, 'robots=\nauthor='),
(86, 'Tinh nghịch mùa hè với áo thun dáng dài', 'tinh-nghich-mua-he-voi-ao-thun-dang-dai', '', '<p style="text-align: justify;">Áo thun dáng dài được yêu thích vì sự  năng động, trẻ trung và rất dễ phối đồ. Bạn có thể kết hợp áo với thắt  lưng bản to hoặc bản nhỏ, hoặc để suông dáng áo mặc kèm với legging bó,  jean skinny, quần ngố. Hoặc với những bạn nhỏ nhắn, áo có thể trở thành  một chiếc váy độc đáo và đáng yêu.</p>\r\n<p style="text-align: justify;"> </p>\r\n', '\r\n<p> </p>\r\n<p style="text-align: center;"><img src="http://khamphadep.vn/uploaded/thoi%20trang%20cuoc%20song/TTCS%20Q2-2010/tinh-nghich-mua-he-voi-ao-thun-dang-dai-1%20copy.jpg" border="0" alt="Tinh nghịch mùa hè với áo thun dáng dài" title="Tinh nghịch mùa hè với áo thun dáng dài" width="450" height="675" /></p>\r\n<p style="text-align: center;"><img src="http://khamphadep.vn/uploaded/thoi%20trang%20cuoc%20song/TTCS%20Q2-2010/tinh-nghich-mua-he-voi-ao-thun-dang-dai-2%20copy.jpg" border="0" alt="Tinh nghịch mùa hè với áo thun dáng dài" title="Tinh nghịch mùa hè với áo thun dáng dài" width="450" height="675" /></p>\r\n<p style="text-align: center;"><img src="http://khamphadep.vn/uploaded/thoi%20trang%20cuoc%20song/TTCS%20Q2-2010/tinh-nghich-mua-he-voi-ao-thun-dang-dai-3%20copy.jpg" border="0" alt="Tinh nghịch mùa hè với áo thun dáng dài" title="Tinh nghịch mùa hè với áo thun dáng dài" width="450" height="675" /></p>\r\n<p style="text-align: center;"><img src="http://khamphadep.vn/uploaded/thoi%20trang%20cuoc%20song/TTCS%20Q2-2010/tinh-nghich-mua-he-voi-ao-thun-dang-dai-4%20copy.jpg" border="0" alt="Tinh nghịch mùa hè với áo thun dáng dài" title="Tinh nghịch mùa hè với áo thun dáng dài" width="450" height="675" /></p>\r\n<p style="text-align: center;"><img src="http://khamphadep.vn/uploaded/thoi%20trang%20cuoc%20song/TTCS%20Q2-2010/tinh-nghich-mua-he-voi-ao-thun-dang-dai-5%20copy.jpg" border="0" alt="Tinh nghịch mùa hè với áo thun dáng dài" title="Tinh nghịch mùa hè với áo thun dáng dài" width="450" height="675" /></p>\r\n<p style="text-align: center;"><img src="http://khamphadep.vn/uploaded/thoi%20trang%20cuoc%20song/TTCS%20Q2-2010/tinh-nghich-mua-he-voi-ao-thun-dang-dai-6%20copy.jpg" border="0" alt="Tinh nghịch mùa hè với áo thun dáng dài" title="Tinh nghịch mùa hè với áo thun dáng dài" width="450" height="694" /></p>\r\n<p style="text-align: center;"><img src="http://khamphadep.vn/uploaded/thoi%20trang%20cuoc%20song/TTCS%20Q2-2010/tinh-nghich-mua-he-voi-ao-thun-dang-dai-7%20copy.jpg" border="0" alt="Tinh nghịch mùa hè với áo thun dáng dài" title="Tinh nghịch mùa hè với áo thun dáng dài" width="450" height="675" /></p>\r\n<p style="text-align: center;"><img src="http://khamphadep.vn/uploaded/thoi%20trang%20cuoc%20song/TTCS%20Q2-2010/tinh-nghich-mua-he-voi-ao-thun-dang-dai-8%20copy.jpg" border="0" alt="Tinh nghịch mùa hè với áo thun dáng dài" title="Tinh nghịch mùa hè với áo thun dáng dài" width="450" height="580" /></p>\r\n<p style="text-align: center;"><img src="http://khamphadep.vn/uploaded/thoi%20trang%20cuoc%20song/TTCS%20Q2-2010/tinh-nghich-mua-he-voi-ao-thun-dang-dai-9%20copy.jpg" border="0" alt="Tinh nghịch mùa hè với áo thun dáng dài" title="Tinh nghịch mùa hè với áo thun dáng dài" width="450" height="675" /></p>\r\n<p style="text-align: center;"><img src="http://khamphadep.vn/uploaded/thoi%20trang%20cuoc%20song/TTCS%20Q2-2010/tinh-nghich-mua-he-voi-ao-thun-dang-dai-10%20copy.jpg" border="0" alt="Tinh nghịch mùa hè với áo thun dáng dài" title="Tinh nghịch mùa hè với áo thun dáng dài" width="450" height="510" /></p>\r\n<p style="text-align: center;"><img src="http://khamphadep.vn/uploaded/thoi%20trang%20cuoc%20song/TTCS%20Q2-2010/tinh-nghich-mua-he-voi-ao-thun-dang-dai-11%20copy.jpg" border="0" alt="Tinh nghịch mùa hè với áo thun dáng dài" title="Tinh nghịch mùa hè với áo thun dáng dài" width="450" height="527" /></p>\r\n<p style="text-align: center;"><img src="http://khamphadep.vn/uploaded/thoi%20trang%20cuoc%20song/TTCS%20Q2-2010/tinh-nghich-mua-he-voi-ao-thun-dang-dai-12%20copy.jpg" border="0" alt="Tinh nghịch mùa hè với áo thun dáng dài" title="Tinh nghịch mùa hè với áo thun dáng dài" width="450" height="675" /></p>\r\n<p style="text-align: center;"><img src="http://khamphadep.vn/uploaded/thoi%20trang%20cuoc%20song/TTCS%20Q2-2010/tinh-nghich-mua-he-voi-ao-thun-dang-dai-13%20copy.jpg" border="0" alt="Tinh nghịch mùa hè với áo thun dáng dài" title="Tinh nghịch mùa hè với áo thun dáng dài" width="450" height="675" /></p>\r\n<p style="text-align: center;"><img src="http://khamphadep.vn/uploaded/thoi%20trang%20cuoc%20song/TTCS%20Q2-2010/tinh-nghich-mua-he-voi-ao-thun-dang-dai-14%20copy.jpg" border="0" alt="Tinh nghịch mùa hè với áo thun dáng dài" title="Tinh nghịch mùa hè với áo thun dáng dài" width="450" height="547" /></p>\r\n<p style="text-align: center;"><img src="http://khamphadep.vn/uploaded/thoi%20trang%20cuoc%20song/TTCS%20Q2-2010/tinh-nghich-mua-he-voi-ao-thun-dang-dai-15%20copy.jpg" border="0" alt="Tinh nghịch mùa hè với áo thun dáng dài" title="Tinh nghịch mùa hè với áo thun dáng dài" width="450" height="524" /></p>\r\n<p style="text-align: center;"><img src="http://khamphadep.vn/uploaded/thoi%20trang%20cuoc%20song/TTCS%20Q2-2010/tinh-nghich-mua-he-voi-ao-thun-dang-dai-16%20copy.jpg" border="0" alt="Tinh nghịch mùa hè với áo thun dáng dài" title="Tinh nghịch mùa hè với áo thun dáng dài" width="450" height="753" /></p>\r\n<p style="text-align: center;"><img src="http://khamphadep.vn/uploaded/thoi%20trang%20cuoc%20song/TTCS%20Q2-2010/tinh-nghich-mua-he-voi-ao-thun-dang-dai-17%20copy.jpg" border="0" alt="Tinh nghịch mùa hè với áo thun dáng dài" title="Tinh nghịch mùa hè với áo thun dáng dài" width="450" height="547" /></p>\r\n<p style="text-align: center;"><img src="http://khamphadep.vn/uploaded/thoi%20trang%20cuoc%20song/TTCS%20Q2-2010/tinh-nghich-mua-he-voi-ao-thun-dang-dai-18%20copy.jpg" border="0" alt="Tinh nghịch mùa hè với áo thun dáng dài" title="Tinh nghịch mùa hè với áo thun dáng dài" width="450" height="675" /></p>\r\n<p style="text-align: center;"><img src="http://khamphadep.vn/uploaded/thoi%20trang%20cuoc%20song/TTCS%20Q2-2010/tinh-nghich-mua-he-voi-ao-thun-dang-dai-19%20copy.jpg" border="0" alt="Tinh nghịch mùa hè với áo thun dáng dài" title="Tinh nghịch mùa hè với áo thun dáng dài" width="450" height="675" /></p>\r\n<p style="text-align: center;"><img src="http://khamphadep.vn/uploaded/thoi%20trang%20cuoc%20song/TTCS%20Q2-2010/tinh-nghich-mua-he-voi-ao-thun-dang-dai-20%20copy.jpg" border="0" alt="Tinh nghịch mùa hè với áo thun dáng dài" title="Tinh nghịch mùa hè với áo thun dáng dài" width="450" height="563" /></p>\r\n<p style="text-align: center;"> </p>\r\n<p style="text-align: right;"><strong>nguồn: khamphadep.vn</strong></p>', 1, 1, 0, 6, '2010-06-08 21:15:33', 62, '', '2010-10-11 07:35:16', 82, 0, '0000-00-00 00:00:00', '2010-06-08 21:15:33', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 2, 0, 5, 'OS 6', '', 0, 15, 'robots=\nauthor='),
(87, 'Đón nắng hè cùng OPND', 'don-nang-he-cung-opnd', '', '<p style="text-align: justify;">BST hè 2010 của nhãn hiệu thời trang mặc  nhà OPND gồm những thiết kế năng động và tiện dụng dành cho những người  phụ nữ thành đạt .</p>\r\n<p style="text-align: justify;">\r\n', '\r\n<br />BST do diên viên nổi tiếng Thúy Hằng và  Nguời mẫu Vân Hà thể hiện đã mang lại màu sắc riêng cho chị em trong mùa hè năm nay.</p>\r\n<p style="text-align: center;"><img src="http://khamphadep.vn/uploaded/khuyen%20mai/KM%20Q2-2010/don-nang-he-cung-opnd-1.jpg" border="0" alt="Đón nắng hè cùng OPND" title="Đón nắng hè cùng OPND" width="450" height="450" style="border: 1px solid black;" /></p>\r\n<p style="text-align: center;"><img src="http://khamphadep.vn/uploaded/khuyen%20mai/KM%20Q2-2010/don-nang-he-cung-opnd-2.jpg" border="0" alt="Đón nắng hè cùng OPND" title="Đón nắng hè cùng OPND" width="450" height="450" style="border: 1px solid black;" /></p>\r\n<p style="text-align: center;"><img src="http://khamphadep.vn/uploaded/khuyen%20mai/KM%20Q2-2010/don-nang-he-cung-opnd-3.jpg" border="0" alt="Đón nắng hè cùng OPND" title="Đón nắng hè cùng OPND" width="450" height="450" style="border: 1px solid black;" /></p>\r\n<p style="text-align: center;"><img src="http://khamphadep.vn/uploaded/khuyen%20mai/KM%20Q2-2010/don-nang-he-cung-opnd-4.jpg" border="0" alt="Đón nắng hè cùng OPND" title="Đón nắng hè cùng OPND" width="450" height="450" style="border: 1px solid black;" /></p>\r\n<p style="text-align: center;"><img src="http://khamphadep.vn/uploaded/khuyen%20mai/KM%20Q2-2010/don-nang-he-cung-opnd-5.jpg" border="0" alt="Đón nắng hè cùng OPND" title="Đón nắng hè cùng OPND" width="450" height="450" style="border: 1px solid black;" /></p>\r\n<p style="text-align: justify;">Luôn song hành cùng nhịp bước thời trang  , OPND đã nắm bắt được xu hướng về màu sắc trong mùa hè năm nay và gửi  vào những thiết kế đầy sáng tạo của mình món quà thời trang hiện đại  nhưng cũng vô cùng nữ tính . Với những gam màu hot  như  : xanh ngọc ,  đỏ san hô , màu da nâu , hồng cà chua , vàng chanh , tím violet và xám  Melance cùng các họa tiết hoa văn đặc sắc , hay những chiếc cúc điểm  nhấn , đường viền bo,các đường cắt cúp tinh tế đã làm cho bộ trang phục ở  nhà của bạn thêm nổi bật trong nắng hè .</p>\r\n<p style="text-align: justify;">Hãy ngắm nhìn Thúy Hằng và Vân Hà  xinh đẹp , năng động trong bộ trang phục ở nhà của nhãn hiệu OPND nhé.<br /><br />Hệ thống cửa hàng của OPND:<br />1. Showroom: 339 Cầu Giấy-Q Cầu Giấy-HN    ĐT: (04) 3.7676338<br />2. Shop 2      : 97 Chùa Bộc- Q Đống Đa-HN<br />3. Shop 3      : 208G Đội Cấn- Q Ba Đình-HN<br />4. Shop 4      : 107 Tôn Đức Thắng-Q Đống Đa-HN<br />5. Nhà phân phối phía nam: C.Ty TNHH XD&amp; TM Đại Hoàng Sơn<br />Showroom 1: 1128 CM Tháng 8-P4-Q Tân Bình-TP HCM   ĐT: (08)3.6062567<br />Và hệ thống các đại lý trên toàn quốc.<br />Văn phòng: Công ty TNHH Minh Hương PND<br />3b Ngách 1194/50 Đường Láng-Đống Đa-HN<br />Tel: (04) 3.7667353   Hotline: 0912.354468</p>\r\n<p style="text-align: justify;"> </p>\r\n<p style="text-align: right;"><strong>nguồn: khamphadep.vn</strong></p>', 1, 1, 0, 6, '2010-06-08 16:53:09', 62, '', '2010-10-12 06:41:18', 82, 0, '0000-00-00 00:00:00', '2010-06-08 16:53:09', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 3, 0, 4, '9800', '', 0, 18, 'robots=\nauthor='),
(88, 'Phong cách áo len mới mẻ và vô cùng đẹp', 'phong-cach-ao-len-moi-me-va-vo-cung-dep', '', '<div>Có thể nói trong những ngày đầu thu xu  hướng những chiếc <span>áo len</span> dệt kim mỏng đang lên ngôi và các bạn trẻ đặc  biệt ưa thích bởi lẽ thiết kế <span>áo len</span> ngày nay không còn cũ kĩ, đơn điệu  như xưa kia. Qua bàn tay của các nhà thiết kế <span>áo len</span> đã mang một phong  cách mới tươi trẻ trong kiểu dáng cũng như phối tông màu tinh tế, nổi  bật hơn nhiều.</div>\r\n<div>\r\n', '\r\n</div>\r\n<div>\r\n<p>Điểm nổi bật của chất liệu len dệt kim mà ai cũng  phải thừa nhận đó  là nó mềm mại tạo dựng được dáng áo, vừa tạo cảm giác  thoải mái cho  người sở hữu lại giữ đủ ấm trong khi trời se lạnh. Màu sắc  bắt mắt gợi  sự ấm áp như: vàng, đỏ, xanh … đôi khi là những màu trung  tính như ghi,  sọc, be tạo nét đẹp thanh lịch.</p>\r\n<p>Mời các bạn cùng chiêm ngưỡng và tham khảo các cách kết hợp với <span><a href="http://tintucthoitrang.com/tag/ao-len" target="_blank" title="View all posts in áo len">áo len</a></span> nhé!</p>\r\n<p>Với những chiếc len khoác:</p>\r\n<p>Kiểu  dáng <span><a href="http://tintucthoitrang.com/tag/ao-len" target="_blank" title="View all posts in áo len">áo len</a></span> khoác ngoài có thể là dáng ngắn , có thể là dáng dài nhưng  đều tạo cho  người mặc một phong cách trẻ trung, năng động. Những bạn gái  có dáng  người mi nhon hoặc hơi thấp một chút thì mặc kiểu ngắn trong  khi bạn  hơi mập, to cao thì nên chọn cho mình những chiếc len khoác dáng  dài sẽ  cân đối được cơ thể.</p>\r\n<p>Điểm cộng:</p>\r\n<p>- Có thể mặc chân váy + áo sơ mi hoặc áo phông bên trong và khoác bên ngoài một chiếc len mỏng vừa có phong cách lại tiện lợi.</p>\r\n<p>- Áo len khoác cũng có thế kết hợp cùng một chiếc váy liền hoặc <span><a href="http://tintucthoitrang.com/" target="_blank" title="quần">quần</a></span> tây..</p>\r\n<p>- Phụ kiện đi kèm đó là những đôi <span><a href="http://tintucthoitrang.com/phu-kien/thoi-trang-giay-dep" target="_blank" title="giày">giày</a></span> cao gót hoặc bốt cao cổ….</p>\r\n</div>\r\n<p><a href="http://img.2sao.vietnamnet.vn/2010/09/15/16/53/150910khoaclen1.jpg" rel="lightbox[roadtrip]"><img src="http://img.2sao.vietnamnet.vn/2010/09/15/16/53/150910khoaclen1.jpg" border="0" /></a></p>\r\n<p><a href="http://img.2sao.vietnamnet.vn/2010/09/15/16/52/150910khoaclen8.jpg" rel="lightbox[roadtrip]"><img src="http://img.2sao.vietnamnet.vn/2010/09/15/16/52/150910khoaclen8.jpg" border="0" /></a></p>\r\n<p>Với những chiếc áo len chùm hông:</p>\r\n<p>Kiểu  áo len chùm hông, dáng suông thích hợp với bạn gái cho <span><a href="http://tintucthoitrang.com/phu-kien/trang-suc-thoi-trang" target="_blank" title="vòng">vòng</a></span> eo hơi to  và <span><a href="http://tintucthoitrang.com/phu-kien/trang-suc-thoi-trang" target="_blank" title="vòng">vòng</a></span> 3 đầy đặn. Khi mặc kiểu này chắc chắn sẽ giúp bạn che lấp được  số đo  cồng kềnh. Bên cạnh đó, nên chú ý là chọn tông màu sẫm thì trông  bạn sẽ  bắt mắt hơn đấy.</p>\r\n<p>Với  những chiếc áo len chùm bạn có thể kết hợp với váy ngắn, tất <span><a href="http://tintucthoitrang.com/" target="_blank" title="quần">quần</a></span> đi  cùng với bốt, <span><a href="http://tintucthoitrang.com/phu-kien/thoi-trang-giay-dep" target="_blank" title="giày">giày</a></span> cao gót hoặc <span><a href="http://tintucthoitrang.com/phu-kien/thoi-trang-giay-dep" target="_blank" title="giày">giày</a></span> búp bê;  hoặc áo len chùm với <span><a href="http://tintucthoitrang.com/" target="_blank" title="quần">quần</a></span> tây, <span><a href="http://tintucthoitrang.com/" target="_blank" title="quần">quần</a></span> jean…</p>\r\n<p><a href="http://img.2sao.vietnamnet.vn/2010/09/15/16/53/150910khoaclen21.jpg" rel="lightbox[roadtrip]"><img src="http://img.2sao.vietnamnet.vn/2010/09/15/16/53/150910khoaclen21.jpg" border="0" /></a></p>\r\n<p><a href="http://img.2sao.vietnamnet.vn/2010/09/15/16/53/150910khoaclen23.jpg" rel="lightbox[roadtrip]"><img src="http://img.2sao.vietnamnet.vn/2010/09/15/16/53/150910khoaclen23.jpg" border="0" /></a></p>\r\n<p><a href="http://img.2sao.vietnamnet.vn/2010/09/15/16/53/150910khoaclen28.jpg" rel="lightbox[roadtrip]"><img src="http://img.2sao.vietnamnet.vn/2010/09/15/16/53/150910khoaclen28.jpg" border="0" /></a></p>\r\n<p><a href="http://img.2sao.vietnamnet.vn/2010/09/15/16/53/150910khoaclen25.jpg" rel="lightbox[roadtrip]"><img src="http://img.2sao.vietnamnet.vn/2010/09/15/16/53/150910khoaclen25.jpg" border="0" /></a></p>\r\n<div>Với những chiếc áo len cao cổ:\r\n<p>Không  cần cầu kỳ và diêm dúa đó là kiểu áo len cổ cao 3 phân hoặc cổ  cao sun  nhún. Kiểu áo này cũng rất dễ tính cho bạn kết hợp với các  kiểu <span><a href="http://tintucthoitrang.com/" target="_blank" title="quần">quần</a></span> hay  chân váy để tạo nên một phong cách mới lạ.</p>\r\n</div>\r\n<p><a href="http://img.2sao.vietnamnet.vn/2010/09/15/16/53/150910khoaclen3.jpg" rel="lightbox[roadtrip]"><img src="http://img.2sao.vietnamnet.vn/2010/09/15/16/53/150910khoaclen3.jpg" border="0" /></a></p>\r\n<p><a href="http://img.2sao.vietnamnet.vn/2010/09/15/16/53/150910khoaclen27.jpg" rel="lightbox[roadtrip]"><img src="http://img.2sao.vietnamnet.vn/2010/09/15/16/53/150910khoaclen27.jpg" border="0" /></a></p>\r\n<p><a href="http://img.2sao.vietnamnet.vn/2010/09/15/16/53/150910khoaclen5.jpg" rel="lightbox[roadtrip]"><img src="http://img.2sao.vietnamnet.vn/2010/09/15/16/53/150910khoaclen5.jpg" border="0" /></a></p>\r\n<p><a href="http://img.2sao.vietnamnet.vn/2010/09/15/16/53/150910khoaclen29.jpg" rel="lightbox[roadtrip]"><img src="http://img.2sao.vietnamnet.vn/2010/09/15/16/53/150910khoaclen29.jpg" border="0" /></a></p>\r\n<p><a href="http://img.2sao.vietnamnet.vn/2010/09/15/16/52/150910khoaclen7.jpg" rel="lightbox[roadtrip]"><img src="http://img.2sao.vietnamnet.vn/2010/09/15/16/52/150910khoaclen7.jpg" border="0" /></a></p>\r\n<p><a href="http://img.2sao.vietnamnet.vn/2010/09/15/16/53/150910khoaclen4.jpg" rel="lightbox[roadtrip]"><img src="http://img.2sao.vietnamnet.vn/2010/09/15/16/53/150910khoaclen4.jpg" border="0" /></a></p>\r\n<p> </p>\r\n<p style="text-align: right;"><strong>nguồn: tintucthoitrang.com</strong></p>', 1, 1, 0, 6, '2010-06-08 16:42:01', 62, '', '2010-10-11 07:40:10', 82, 0, '0000-00-00 00:00:00', '2010-06-08 16:42:01', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 2, 0, 3, '9700', '', 0, 23, 'robots=\nauthor=');
INSERT INTO `hdt_content` (`id`, `title`, `alias`, `title_alias`, `introtext`, `fulltext`, `state`, `sectionid`, `mask`, `catid`, `created`, `created_by`, `created_by_alias`, `modified`, `modified_by`, `checked_out`, `checked_out_time`, `publish_up`, `publish_down`, `images`, `urls`, `attribs`, `version`, `parentid`, `ordering`, `metakey`, `metadesc`, `access`, `hits`, `metadata`) VALUES
(89, 'Ngắm các sao với những bộ thời trang trên thảm đỏ', 'ngam-cac-sao-voi-nhung-bo-thoi-trang-tren-tham-do', '', '<div><a href="http://img.2sao.vietnamnet.vn/2010/07/06/02/35/run0.jpg" rel="lightbox[roadtrip]"><img src="http://img.2sao.vietnamnet.vn/2010/07/06/02/35/run0.jpg" border="0" /></a></div>\r\n<p>Hãy cùng chiêm ngưỡng để xem <span><a href="http://tintucthoitrang.com/nguoi-mau" target="_blank" title="sao">sao</a></span> hoàn hảo như thế nào khi khoác lên người những  bộ cách tuyệt đẹp và so sánh xem giữa <span><a href="http://tintucthoitrang.com/nguoi-mau" target="_blank" title="sao">sao</a></span> – <span><a href="http://tintucthoitrang.com/nguoi-mau" target="_blank" title="người mẫu">người mẫu</a></span> thì ai mặc đẹp  hơn.</p>\r\n<p>\r\n', '\r\n</p>\r\n<p>Demi Lovato</p>\r\n<p><a href="http://img.2sao.vietnamnet.vn/2010/07/06/02/35/run20.jpg" rel="lightbox[roadtrip]"><img src="http://img.2sao.vietnamnet.vn/2010/07/06/02/35/run20.jpg" border="0" /></a></p>\r\n<p>Demi  Lovato khoe những đường cong trưởng thành của mình khi đến tham   dự buổi ra mắt bộ phim Oceans ở  Hollywood. Khuôn ngực đầy đặn  và eo  thon duyên dáng của Demi Lovato  đã phô diễn được trọn vẹn trong chiếc  váy của BCBGMAXAZRIA.</p>\r\n<p>Victoria  Beckham</p>\r\n<p><a href="http://img.2sao.vietnamnet.vn/2010/07/06/02/35/run19.jpg" rel="lightbox[roadtrip]"><img src="http://img.2sao.vietnamnet.vn/2010/07/06/02/35/run19.jpg" border="0" /></a></p>\r\n<p>Phong cách <span><a href="http://tintucthoitrang.com/" target="_blank" title="Thoi trang">thời trang</a></span> sang trọng,  quý phái và đài các chính là thương hiệu của quý bà sành điệu Victoria Beckham. Chiếc váy <span><a href="http://tintucthoitrang.com/thoi-trang/thoi-trang-da-hoi" target="_blank" title="dạ hội">dạ hội</a></span> dài  tay đã giúp bà Beck thực sự nổi  bật và sang trọng. Đây là thiết kế đã từng được rất nhiều <span><a href="http://tintucthoitrang.com/nguoi-mau" target="_blank" title="sao">sao</a></span> lựa chọn,  nhưng Victoria có vẻ như là  người hợp nhất với kiểu váy này.</p>\r\n<p>Olivia  Palermo</p>\r\n<p><a href="http://img.2sao.vietnamnet.vn/2010/07/06/02/36/run17.jpg" rel="lightbox[roadtrip]"><img src="http://img.2sao.vietnamnet.vn/2010/07/06/02/36/run17.jpg" border="0" /></a></p>\r\n<p>Ngôi <span><a href="http://tintucthoitrang.com/nguoi-mau" target="_blank" title="sao">sao</a></span> của The City luôn sang trọng và quý phái  khi xuất hiện trước công  chúng. Khi đến tham dự một sự kiện từ thiện  được tổ chức tại New York,  Olivia đã thu hút ánh nhìn của tất cả  mọi người tham gia khi diện chiếc  váy cocktail lông vũ tuyệt đẹp của Prabal Gurung. Giầy Charlotte  Olympia, váy Prabal Gurung và tóc búi cao, Olivia Palermo trông thật  hoàn hảo.</p>\r\n<p>Kylie Minogue</p>\r\n<p><a href="http://img.2sao.vietnamnet.vn/2010/07/06/02/36/run16.jpg" rel="lightbox[roadtrip]"><img src="http://img.2sao.vietnamnet.vn/2010/07/06/02/36/run16.jpg" border="0" /></a></p>\r\n<p>Ngôi sao quốc tế Kylie Minogue tự hào khoe dáng chuẩn  trong chiếc  váy vai lệch gợi cảm khi đến tham dự Lễ trao giải National Movie. Ngôi  sao  nhạc pop người Úc này đã tỏ ra là một quý cô <span><a href="http://tintucthoitrang.com/" target="_blank" title="Thoi trang">thời trang</a></span> khi quyết định  chọn thiết kế tuyệt đẹp của Emilio  Pucci để phát huy  lợi thế đường cong và để hạn chế sự khiêm tốn  của chiều cao.</p>\r\n<p>Kate Bosworth</p>\r\n<p><a href="http://img.2sao.vietnamnet.vn/2010/07/06/02/37/run15.jpg" rel="lightbox[roadtrip]"><img src="http://img.2sao.vietnamnet.vn/2010/07/06/02/37/run15.jpg" border="0" /></a></p>\r\n<p>Kate  vẫn luôn là một ngôi sao <span><a href="http://tintucthoitrang.com/" target="_blank" title="Thoi trang">thời trang</a></span> và sành điệu của Hollywood. Chiếc váy cocktail ấn  tượng của Chanel,  tóc búi cao  quý phái và giầy hiệu Christian  Louboutin Maggie, Kate đã   có một <span><a href="http://tintucthoitrang.com/" target="_blank" title="trang phục">trang phục</a></span> không thể hoàn hảo hơn.</p>\r\n<p>Heidi Klum</p>\r\n<p><a href="http://img.2sao.vietnamnet.vn/2010/07/06/02/37/run14.jpg" rel="lightbox[roadtrip]"><img src="http://img.2sao.vietnamnet.vn/2010/07/06/02/37/run14.jpg" border="0" /></a></p>\r\n<p>Heidi  Klum thật xứng đáng với danh hiệu siêu mẫu, cô nàng luôn biết   cách làm mình nổi bật giữa đám đông. Klum  thực sự xinh đẹp và nỏng  bỏng trong <span><a href="http://tintucthoitrang.com/" target="_blank" title="trang phục">trang phục</a></span> toàn Gucci khi đến tham dự Project Runway.</p>\r\n<p>Fergie</p>\r\n<p><a href="http://img.2sao.vietnamnet.vn/2010/07/06/02/38/run13.jpg" rel="lightbox[roadtrip]"><img src="http://img.2sao.vietnamnet.vn/2010/07/06/02/38/run13.jpg" border="0" /></a></p>\r\n<p>Fergie  luôn là nỗi thèm khát của các quý ông. Khuôn ngực đầy đặn, eo  thon  duyên dáng và vòng 3 tròn trịa, đó là những lợi thế luôn được  Fergie phô diễn khi xuất hiện trước  công chúng. Đến tham dự Lễ trao  giải  Grammy 2010, Fergie đã  "đốt mắt" người xem khi phô diễn vẻ đẹp  nóng bỏng của mình bằng chiếc  váy xanh của Emilio Pucci.</p>\r\n<p>Hilary Duff</p>\r\n<p><a href="http://img.2sao.vietnamnet.vn/2010/07/06/02/38/run12.jpg" rel="lightbox[roadtrip]"><img src="http://img.2sao.vietnamnet.vn/2010/07/06/02/38/run12.jpg" border="0" /></a></p>\r\n<p>Hilary  Duff đã phô diễn nét đẹp trẻ trung và gợi cảm trong chiếc váy   cocktail vải tuyn của Vera Wang.  Hilary đã giữ được trọn vẹn vẻ  đẹp  trang nhã và thuần khiết của chiếc váy khi kết hợp nó với mái tóc  búi  cao tự nhiện và đôi giầy cao gót màu da.</p>\r\n<p>Blake Lively</p>\r\n<p><a href="http://img.2sao.vietnamnet.vn/2010/07/06/02/38/run11.jpg" rel="lightbox[roadtrip]"><img src="http://img.2sao.vietnamnet.vn/2010/07/06/02/38/run11.jpg" border="0" /></a></p>\r\n<p>Chiếc váy đăng ten này của Dolce &amp; Gabbana được rất nhiều  người  đẹp Hollywood ưa ái. Tuy  nhiên, Blake Lively đã thực sự  giúp thiết kế  này toả sáng. Mái tóc quăn bồng bềnh, váy đen gợi cảm và  <span><a href="http://tintucthoitrang.com/phu-kien/trang-suc-thoi-trang" target="_blank" title="nhẫn">nhẫn</a></span> cocktail nổi bật, tất cả đã giúp Blake  thực sự trở thành tâm điểm của mọi ánh nhìn.</p>\r\n<p>Ciara</p>\r\n<p><a href="http://img.2sao.vietnamnet.vn/2010/07/06/02/39/run10.jpg" rel="lightbox[roadtrip]"><img src="http://img.2sao.vietnamnet.vn/2010/07/06/02/39/run10.jpg" border="0" /></a></p>\r\n<p>Kiểu váy mà Ciara đang mặc là một trong những  thiết kế nổi bật của  Versace.  Diva của dòng nhạc R &amp; B  thực sự nóng bỏng và sexy trong  chiếc váy <span><a href="http://tintucthoitrang.com/thoi-trang/thoi-trang-da-hoi" target="_blank" title="dạ hội">dạ hội</a></span> duyên dáng này.</p>\r\n<p>Katy Perry</p>\r\n<p><a href="http://img.2sao.vietnamnet.vn/2010/07/06/02/39/run9.jpg" rel="lightbox[roadtrip]"><img src="http://img.2sao.vietnamnet.vn/2010/07/06/02/39/run9.jpg" border="0" /></a></p>\r\n<p>Katy Perry luôn  là người biết cách khiến người khác phải bất ngờ.  Khi đến dự Lễ trao giải Grammy năm 2010, Katy đã khiến tất cả những  người có  mặt phải ngỡ ngàng khi cô nàng tự tin diện chiếc váy <span><a href="http://tintucthoitrang.com/thoi-trang/thoi-trang-da-hoi" target="_blank" title="dạ hội">dạ hội</a></span> lấp lánh của  Zac Posen.</p>\r\n<p>Kim Kardashian</p>\r\n<p><a href="http://img.2sao.vietnamnet.vn/2010/07/06/02/40/run8.jpg" rel="lightbox[roadtrip]"><img src="http://img.2sao.vietnamnet.vn/2010/07/06/02/40/run8.jpg" border="0" /></a></p>\r\n<p>Kim Kardashian  quá hoàn hảo trong kiểu váy này. Chiếc váy Sass and  Bide ôm sát cơ thể giúp cô Kim siêu vòng 3 khoe những đường cong  nóng  bỏng của cơ thể. Xăng đan màu vàng và tóc đuôi gà kết với chiếc váy  này  đã giúp Kim có một trang  phục hoàn hảo.</p>\r\n<p>Kate Hudson</p>\r\n<p><a href="http://img.2sao.vietnamnet.vn/2010/07/06/02/40/run7.jpg" rel="lightbox[roadtrip]"><img src="http://img.2sao.vietnamnet.vn/2010/07/06/02/40/run7.jpg" border="0" /></a></p>\r\n<p>Khó để diễn tả hết bằng lời khi nói về gu <span><a href="http://tintucthoitrang.com/" target="_blank" title="Thoi trang">thời trang</a></span> tinh tế của Kate Hudson. Cô gái  vàng của Hollywood trông thật  hoàn hảo trong chiếc váy <span><a href="http://tintucthoitrang.com/thoi-trang/thoi-trang-da-hoi" target="_blank" title="dạ hội">dạ hội</a></span> của Emilio  Pucci. Tóc búi cao, hoa tai kim cương và váy trắng thướt tha, Kate Hudson trông như một quý bà đài  các.</p>\r\n<p>Naomi Campbell</p>\r\n<p><a href="http://img.2sao.vietnamnet.vn/2010/07/06/02/40/run6.jpg" rel="lightbox[roadtrip]"><img src="http://img.2sao.vietnamnet.vn/2010/07/06/02/40/run6.jpg" border="0" /></a></p>\r\n<p>Naomi Campbell  có quá nhiều vấn đề khiến chúng ta phải ái ngại,  nhưng chúng ta đều phải  thừa nhận, cô nàng này thực sự có khiếu về thời  trang. Naomi quá hoàn hảo khi diện thiết kế  của Alexander McQueen.</p>\r\n<p>Rihanna</p>\r\n<p><a href="http://img.2sao.vietnamnet.vn/2010/07/06/02/42/run4.jpg" rel="lightbox[roadtrip]"><img src="http://img.2sao.vietnamnet.vn/2010/07/06/02/42/run4.jpg" border="0" /></a></p>\r\n<p>Rihanna đúng là  biểu tượng thời trang của thế hệ trẻ hiện nay, nóng  bỏng và gợi cảm.  Xuất hiện tại American Music năm 2010,  Rihanna đã như  nữ hoàng trong  chiếc váy dạ hội tuyệt đẹp của Marchesa.</p>\r\n<p>Jessica Alba</p>\r\n<p><a href="http://img.2sao.vietnamnet.vn/2010/07/06/02/42/run3.jpg" rel="lightbox[roadtrip]"><img src="http://img.2sao.vietnamnet.vn/2010/07/06/02/42/run3.jpg" border="0" /></a></p>\r\n<p>Jessica Alba  luôn nổi bật và rạng ngời khi xuất hiện tại các sự kiện  thảm đỏ. Tại  buổi ra mắt bộ phim Valentine’s Day,  Alba đã rất xinh  đẹp và duyên  dáng khi chọn cho mình chiếc váy của Proenza  Schouler.</p>\r\n<p> </p>\r\n<p style="text-align: right;"><strong>nguồn: tintucthoitrang.com</strong></p>', 1, 1, 0, 6, '2010-06-08 14:45:28', 62, '', '2010-10-12 06:42:37', 82, 0, '0000-00-00 00:00:00', '2010-06-08 14:45:28', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 4, 0, 2, 'Pearl 3G', '', 0, 8, 'robots=\nauthor='),
(90, 'Xu hướng váy ngắn lưng cao', 'xu-huong-vay-ngan-lung-cao', '', '<div>\r\n<div>Volume  mini- Thời trang váy ngắn lưng cao giúp bạn khoe  khéo đôi  chân dài và  thon đã trở lại trong mùa hè này. Sự thông dụng và  dễ kết  hợp của mẫu  váy này khiến bạn không thể từ chối để diện chúng  ngay cả  khi đi làm và  đi chơi. Bằng các cách kết hợp với áo khác nhau,  bạn có  thể mang đến  nhiều phong cách <span>thời trang</span> cho mình với chỉ cùng  một chiếc Volume  mini.</div>\r\n<div>\r\n', '\r\n</div>\r\n<div>Khi diện Volume mini, bạn  phải “cắm thùng” áo vào  trong váy. Đó là một cách khoe khéo <span><a href="http://tintucthoitrang.com/phu-kien/trang-suc-thoi-trang" target="_blank" title="vòng">vòng</a></span> eo  thon và cũng tạo cảm giác  đôi chân thon và dài hơn.</div>\r\n<div>Với một chiếc   Volume mini, bạn có thể kết hợp  duyên dáng, thanh lịch với áo sơ mi   hoặc trẻ trung, khỏe khoắn với áo  phông. Volume  mini thường được làm  bằng chất liệu hơi thun, co giãn giúp  cho người  mặc cảm thấy thật  thoải mái khi ngồi và dễ dàng khi đi lại</div>\r\n</div>\r\n<div id="flashcontent"><strong>You need to upgrade your Flash Player</strong></div>\r\n<div id="flashcontentcolumn"><strong>You need to upgrade your Flash Player</strong></div>\r\n<div style="text-align: center;"></div>\r\n<div style="text-align: center;"><img src="http://images1.afamily.channelvn.net/Images/Uploaded/Share/2010/04/27/D434390x8.jpg" border="0" width="400" /></div>\r\n<p style="text-align: center;"><img src="http://images1.afamily.channelvn.net/Images/Uploaded/Share/2010/04/27/D445185x8.jpg" border="0" width="400" /></p>\r\n<p style="text-align: center;"><img src="http://images1.afamily.channelvn.net/Images/Uploaded/Share/2010/04/27/D445185x2.jpg" border="0" width="400" /></p>\r\n<p style="text-align: center;"><img src="http://images1.afamily.channelvn.net/Images/Uploaded/Share/2010/04/27/D438323x6.jpg" border="0" width="400" /></p>\r\n<p style="text-align: center;"><img src="http://images1.afamily.channelvn.net/Images/Uploaded/Share/2010/04/27/D438323x5.jpg" border="0" width="400" /></p>\r\n<p style="text-align: center;"><img src="http://images1.afamily.channelvn.net/Images/Uploaded/Share/2010/04/27/D438323x3.jpg" border="0" width="400" /></p>\r\n<p style="text-align: center;"><img src="http://images1.afamily.channelvn.net/Images/Uploaded/Share/2010/04/27/D438323x1.jpg" border="0" width="400" /></p>\r\n<p style="text-align: center;"><img src="http://images1.afamily.channelvn.net/Images/Uploaded/Share/2010/04/27/D436860x7.jpg" border="0" width="400" /></p>\r\n<p style="text-align: center;"><img src="http://images1.afamily.channelvn.net/Images/Uploaded/Share/2010/04/27/D436860x5.jpg" border="0" width="400" /></p>\r\n<p style="text-align: center;"><img src="http://images1.afamily.channelvn.net/Images/Uploaded/Share/2010/04/27/D436860x1.jpg" border="0" width="400" /></p>\r\n<p style="text-align: center;"><img src="http://images1.afamily.channelvn.net/Images/Uploaded/Share/2010/04/27/D435076x6.jpg" border="0" width="400" /></p>\r\n<p style="text-align: center;"><img src="http://images1.afamily.channelvn.net/Images/Uploaded/Share/2010/04/27/D435076x5.jpg" border="0" width="400" /></p>\r\n<p style="text-align: center;"><img src="http://images1.afamily.channelvn.net/Images/Uploaded/Share/2010/04/27/D435076x4.jpg" border="0" width="400" /></p>\r\n<p style="text-align: center;"><img src="http://images1.afamily.channelvn.net/Images/Uploaded/Share/2010/04/27/D435076x2.jpg" border="0" width="400" /></p>\r\n<p> </p>\r\n<p style="text-align: right;"><strong>nguồn: tintucthoitrang.com</strong></p>', 1, 1, 0, 6, '2010-06-08 13:59:13', 62, '', '2010-10-13 08:17:28', 82, 82, '2010-10-13 08:34:24', '2010-06-08 13:59:13', '0000-00-00 00:00:00', '', '', 'show_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_vote=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nlanguage=\nkeyref=\nreadmore=', 9, 0, 1, 'Bold 9650, Pearl 3g', '', 0, 60, 'robots=\nauthor=');

-- --------------------------------------------------------

--
-- Structure de la table `hdt_content_frontpage`
--

CREATE TABLE IF NOT EXISTS `hdt_content_frontpage` (
  `content_id` int(11) NOT NULL default '0',
  `ordering` int(11) NOT NULL default '0',
  PRIMARY KEY  (`content_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `hdt_content_frontpage`
--


-- --------------------------------------------------------

--
-- Structure de la table `hdt_content_rating`
--

CREATE TABLE IF NOT EXISTS `hdt_content_rating` (
  `content_id` int(11) NOT NULL default '0',
  `rating_sum` int(11) unsigned NOT NULL default '0',
  `rating_count` int(11) unsigned NOT NULL default '0',
  `lastip` varchar(50) NOT NULL default '',
  PRIMARY KEY  (`content_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `hdt_content_rating`
--


-- --------------------------------------------------------

--
-- Structure de la table `hdt_core_acl_aro`
--

CREATE TABLE IF NOT EXISTS `hdt_core_acl_aro` (
  `id` int(11) NOT NULL auto_increment,
  `section_value` varchar(240) NOT NULL default '0',
  `value` varchar(240) NOT NULL default '',
  `order_value` int(11) NOT NULL default '0',
  `name` varchar(255) NOT NULL default '',
  `hidden` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `hdt_section_value_value_aro` (`section_value`(100),`value`(100)),
  KEY `hdt_gacl_hidden_aro` (`hidden`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Contenu de la table `hdt_core_acl_aro`
--

INSERT INTO `hdt_core_acl_aro` (`id`, `section_value`, `value`, `order_value`, `name`, `hidden`) VALUES
(10, 'users', '62', 0, 'Kevin Khoa', 0),
(27, 'users', '79', 0, 'root', 0),
(30, 'users', '82', 0, 'admin', 0);

-- --------------------------------------------------------

--
-- Structure de la table `hdt_core_acl_aro_groups`
--

CREATE TABLE IF NOT EXISTS `hdt_core_acl_aro_groups` (
  `id` int(11) NOT NULL auto_increment,
  `parent_id` int(11) NOT NULL default '0',
  `name` varchar(255) NOT NULL default '',
  `lft` int(11) NOT NULL default '0',
  `rgt` int(11) NOT NULL default '0',
  `value` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`id`),
  KEY `hdt_gacl_parent_id_aro_groups` (`parent_id`),
  KEY `hdt_gacl_lft_rgt_aro_groups` (`lft`,`rgt`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Contenu de la table `hdt_core_acl_aro_groups`
--

INSERT INTO `hdt_core_acl_aro_groups` (`id`, `parent_id`, `name`, `lft`, `rgt`, `value`) VALUES
(17, 0, 'ROOT', 1, 22, 'ROOT'),
(28, 17, 'USERS', 2, 21, 'USERS'),
(29, 28, 'Public Frontend', 3, 12, 'Public Frontend'),
(18, 29, 'Registered', 4, 11, 'Registered'),
(19, 18, 'Author', 5, 10, 'Author'),
(20, 19, 'Editor', 6, 9, 'Editor'),
(21, 20, 'Publisher', 7, 8, 'Publisher'),
(30, 28, 'Public Backend', 13, 20, 'Public Backend'),
(23, 30, 'Manager', 14, 19, 'Manager'),
(24, 23, 'Administrator', 15, 18, 'Administrator'),
(25, 24, 'Super Administrator', 16, 17, 'Super Administrator');

-- --------------------------------------------------------

--
-- Structure de la table `hdt_core_acl_aro_map`
--

CREATE TABLE IF NOT EXISTS `hdt_core_acl_aro_map` (
  `acl_id` int(11) NOT NULL default '0',
  `section_value` varchar(230) NOT NULL default '0',
  `value` varchar(100) NOT NULL,
  PRIMARY KEY  (`acl_id`,`section_value`,`value`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `hdt_core_acl_aro_map`
--


-- --------------------------------------------------------

--
-- Structure de la table `hdt_core_acl_aro_sections`
--

CREATE TABLE IF NOT EXISTS `hdt_core_acl_aro_sections` (
  `id` int(11) NOT NULL auto_increment,
  `value` varchar(230) NOT NULL default '',
  `order_value` int(11) NOT NULL default '0',
  `name` varchar(230) NOT NULL default '',
  `hidden` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `hdt_gacl_value_aro_sections` (`value`),
  KEY `hdt_gacl_hidden_aro_sections` (`hidden`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `hdt_core_acl_aro_sections`
--

INSERT INTO `hdt_core_acl_aro_sections` (`id`, `value`, `order_value`, `name`, `hidden`) VALUES
(10, 'users', 1, 'Users', 0);

-- --------------------------------------------------------

--
-- Structure de la table `hdt_core_acl_groups_aro_map`
--

CREATE TABLE IF NOT EXISTS `hdt_core_acl_groups_aro_map` (
  `group_id` int(11) NOT NULL default '0',
  `section_value` varchar(240) NOT NULL default '',
  `aro_id` int(11) NOT NULL default '0',
  UNIQUE KEY `group_id_aro_id_groups_aro_map` (`group_id`,`section_value`,`aro_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `hdt_core_acl_groups_aro_map`
--

INSERT INTO `hdt_core_acl_groups_aro_map` (`group_id`, `section_value`, `aro_id`) VALUES
(25, '', 10),
(25, '', 27),
(25, '', 30);

-- --------------------------------------------------------

--
-- Structure de la table `hdt_core_log_items`
--

CREATE TABLE IF NOT EXISTS `hdt_core_log_items` (
  `time_stamp` date NOT NULL default '0000-00-00',
  `item_table` varchar(50) NOT NULL default '',
  `item_id` int(11) unsigned NOT NULL default '0',
  `hits` int(11) unsigned NOT NULL default '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `hdt_core_log_items`
--


-- --------------------------------------------------------

--
-- Structure de la table `hdt_core_log_searches`
--

CREATE TABLE IF NOT EXISTS `hdt_core_log_searches` (
  `search_term` varchar(128) NOT NULL default '',
  `hits` int(11) unsigned NOT NULL default '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `hdt_core_log_searches`
--


-- --------------------------------------------------------

--
-- Structure de la table `hdt_groups`
--

CREATE TABLE IF NOT EXISTS `hdt_groups` (
  `id` tinyint(3) unsigned NOT NULL default '0',
  `name` varchar(50) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `hdt_groups`
--

INSERT INTO `hdt_groups` (`id`, `name`) VALUES
(0, 'Public'),
(1, 'Registered'),
(2, 'Special');

-- --------------------------------------------------------

--
-- Structure de la table `hdt_menu`
--

CREATE TABLE IF NOT EXISTS `hdt_menu` (
  `id` int(11) NOT NULL auto_increment,
  `menutype` varchar(75) default NULL,
  `name` varchar(255) default NULL,
  `alias` varchar(255) NOT NULL default '',
  `link` text,
  `type` varchar(50) NOT NULL default '',
  `published` tinyint(1) NOT NULL default '0',
  `parent` int(11) unsigned NOT NULL default '0',
  `componentid` int(11) unsigned NOT NULL default '0',
  `sublevel` int(11) default '0',
  `ordering` int(11) default '0',
  `checked_out` int(11) unsigned NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `pollid` int(11) NOT NULL default '0',
  `browserNav` tinyint(4) default '0',
  `access` tinyint(3) unsigned NOT NULL default '0',
  `utaccess` tinyint(3) unsigned NOT NULL default '0',
  `params` text NOT NULL,
  `lft` int(11) unsigned NOT NULL default '0',
  `rgt` int(11) unsigned NOT NULL default '0',
  `home` int(1) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `componentid` (`componentid`,`menutype`,`published`,`access`),
  KEY `menutype` (`menutype`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `hdt_menu`
--

INSERT INTO `hdt_menu` (`id`, `menutype`, `name`, `alias`, `link`, `type`, `published`, `parent`, `componentid`, `sublevel`, `ordering`, `checked_out`, `checked_out_time`, `pollid`, `browserNav`, `access`, `utaccess`, `params`, `lft`, `rgt`, `home`) VALUES
(1, 'mainmenu', 'Trang Chủ', 'home', 'index.php?option=com_content&view=frontpage', 'component', 1, 0, 20, 0, 1, 0, '0000-00-00 00:00:00', 0, 0, 0, 3, 'num_leading_articles=1\nnum_intro_articles=4\nnum_columns=2\nnum_links=0\norderby_pri=\norderby_sec=front\nmulti_column_order=1\nshow_pagination=2\nshow_pagination_results=1\nshow_feed_link=1\nshow_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=0\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 1),
(2, 'mainmenu', 'Tin tức', 'tin-tuc', 'index.php?option=com_content&view=category&layout=blog&id=6', 'component', 1, 0, 20, 0, 6, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_description=0\nshow_description_image=0\nnum_leading_articles=0\nnum_intro_articles=4\nnum_columns=1\nnum_links=0\norderby_pri=\norderby_sec=\nmulti_column_order=0\nshow_pagination=2\nshow_pagination_results=1\nshow_feed_link=1\nshow_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(3, 'mainmenu', 'Thời Trang Nam', 'thoi-trang-nam', 'index.php?option=com_products&view=category&catid=9:thoi-trang-nam', 'component', 1, 0, 35, 0, 3, 82, '2010-10-09 03:07:25', 0, 0, 0, 0, 'show_feed_link=1\nlimit=12\npublised_comment=\nemail_contact=contact@nhahangvietxinh.comxxxx\nlimit1=12\nlimit2=17\nid_article=18\ntext_price=Sap co hang\npage_title=Thời Trang Nam\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(4, 'mainmenu', 'Thời Trang Nữ', 'thoi-trang-nu', 'index.php?option=com_products&view=category&catid=24:thoi-trang-nu', 'component', 1, 0, 35, 0, 4, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_feed_link=1\npublised_comment=\nlimit1=10\nlimit2=15\nid_article=15\ntext_price=Sap co hang\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(5, 'mainmenu', 'Liên hệ', 'lien-he', 'index.php?option=com_contact&view=contact&id=1', 'component', 1, 0, 7, 0, 7, 82, '2010-10-09 03:08:30', 0, 0, 0, 0, 'show_contact_list=0\nshow_category_crumb=0\ncontact_icons=\nicon_address=\nicon_email=\nicon_telephone=\nicon_mobile=\nicon_fax=\nicon_misc=\nshow_headings=\nshow_position=\nshow_email=\nshow_telephone=\nshow_mobile=\nshow_fax=\nallow_vcard=\nbanned_email=\nbanned_subject=\nbanned_text=\nvalidate_session=\ncustom_reply=\npage_title=Liên hệ\nshow_page_title=0\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(6, 'menu-left-hide', 'Chia sẻ kiến thức', 'chia-se-kien-thuc', 'index.php?option=com_content&view=category&layout=blog&id=2', 'component', 1, 0, 20, 0, 1, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_description=0\nshow_description_image=0\nnum_leading_articles=1\nnum_intro_articles=4\nnum_columns=2\nnum_links=4\norderby_pri=\norderby_sec=\nmulti_column_order=0\nshow_pagination=2\nshow_pagination_results=1\nshow_feed_link=1\nshow_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(7, 'menu-left-hide', 'Chia sẻ kinh nghiệm', 'chia-se-kinh-nghiem', 'index.php?option=com_content&view=category&layout=blog&id=4', 'component', 1, 0, 20, 0, 2, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_description=0\nshow_description_image=0\nnum_leading_articles=1\nnum_intro_articles=4\nnum_columns=2\nnum_links=4\norderby_pri=\norderby_sec=\nmulti_column_order=0\nshow_pagination=2\nshow_pagination_results=1\nshow_feed_link=1\nshow_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(8, 'menu-left-hide', 'Tin tức BlackBerry', 'tin-tuc-blackberry', 'index.php?option=com_content&view=category&layout=blog&id=5', 'component', 1, 0, 20, 0, 3, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_description=0\nshow_description_image=0\nnum_leading_articles=1\nnum_intro_articles=4\nnum_columns=2\nnum_links=4\norderby_pri=\norderby_sec=\nmulti_column_order=0\nshow_pagination=2\nshow_pagination_results=1\nshow_feed_link=1\nshow_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(9, 'menu-left-hide', 'Điều khoản sử dụng', 'dieu-khoan-su-dung', 'index.php?option=com_content&view=article&id=58', 'component', 1, 0, 20, 0, 4, 62, '2010-06-02 14:12:57', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(10, 'mainmenu', 'Phụ Kiện', 'phu-kien', 'index.php?option=com_products&view=category&catid=25:phu-kien', 'component', 1, 0, 35, 0, 5, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_feed_link=1\npublised_comment=\nlimit1=10\nlimit2=15\nid_article=15\ntext_price=Sap co hang\npage_title=\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(11, 'menu-left-hide', 'tin tuc', 'tin-tuc', 'index.php?option=com_content&view=category&layout=blog&id=5', 'component', 1, 0, 20, 0, 5, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_description=0\nshow_description_image=0\nnum_leading_articles=1\nnum_intro_articles=4\nnum_columns=2\nnum_links=4\norderby_pri=\norderby_sec=\nmulti_column_order=0\nshow_pagination=2\nshow_pagination_results=1\nshow_feed_link=1\nshow_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=BBSaigon.com \\| Tin tức BlackBerry\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0),
(12, 'mainmenu', 'Giới Thiệu', 'gioi-thieu', 'index.php?option=com_content&view=article&id=3', 'component', 1, 0, 20, 0, 2, 0, '0000-00-00 00:00:00', 0, 0, 0, 0, 'show_noauth=\nshow_title=\nlink_titles=\nshow_intro=\nshow_section=\nlink_section=\nshow_category=\nlink_category=\nshow_author=\nshow_create_date=\nshow_modify_date=\nshow_item_navigation=\nshow_readmore=\nshow_vote=\nshow_icons=\nshow_pdf_icon=\nshow_print_icon=\nshow_email_icon=\nshow_hits=\nfeed_summary=\npage_title=Gới Thiệu\nshow_page_title=1\npageclass_sfx=\nmenu_image=-1\nsecure=0\n\n', 0, 0, 0);

-- --------------------------------------------------------

--
-- Structure de la table `hdt_menu_types`
--

CREATE TABLE IF NOT EXISTS `hdt_menu_types` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `menutype` varchar(75) NOT NULL default '',
  `title` varchar(255) NOT NULL default '',
  `description` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `menutype` (`menutype`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `hdt_menu_types`
--

INSERT INTO `hdt_menu_types` (`id`, `menutype`, `title`, `description`) VALUES
(1, 'mainmenu', 'Main Menu', 'The main menu for the site'),
(2, 'menu-left-hide', 'menu-left-hide', 'menu-left-hide');

-- --------------------------------------------------------

--
-- Structure de la table `hdt_messages`
--

CREATE TABLE IF NOT EXISTS `hdt_messages` (
  `message_id` int(10) unsigned NOT NULL auto_increment,
  `user_id_from` int(10) unsigned NOT NULL default '0',
  `user_id_to` int(10) unsigned NOT NULL default '0',
  `folder_id` int(10) unsigned NOT NULL default '0',
  `date_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `state` int(11) NOT NULL default '0',
  `priority` int(1) unsigned NOT NULL default '0',
  `subject` text NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY  (`message_id`),
  KEY `useridto_state` (`user_id_to`,`state`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `hdt_messages`
--


-- --------------------------------------------------------

--
-- Structure de la table `hdt_messages_cfg`
--

CREATE TABLE IF NOT EXISTS `hdt_messages_cfg` (
  `user_id` int(10) unsigned NOT NULL default '0',
  `cfg_name` varchar(100) NOT NULL default '',
  `cfg_value` varchar(255) NOT NULL default '',
  UNIQUE KEY `idx_user_var_name` (`user_id`,`cfg_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `hdt_messages_cfg`
--


-- --------------------------------------------------------

--
-- Structure de la table `hdt_migration_backlinks`
--

CREATE TABLE IF NOT EXISTS `hdt_migration_backlinks` (
  `itemid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `url` text NOT NULL,
  `sefurl` text NOT NULL,
  `newurl` text NOT NULL,
  PRIMARY KEY  (`itemid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `hdt_migration_backlinks`
--


-- --------------------------------------------------------

--
-- Structure de la table `hdt_modules`
--

CREATE TABLE IF NOT EXISTS `hdt_modules` (
  `id` int(11) NOT NULL auto_increment,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `ordering` int(11) NOT NULL default '0',
  `position` varchar(50) default NULL,
  `checked_out` int(11) unsigned NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `published` tinyint(1) NOT NULL default '0',
  `module` varchar(50) default NULL,
  `numnews` int(11) NOT NULL default '0',
  `access` tinyint(3) unsigned NOT NULL default '0',
  `showtitle` tinyint(3) unsigned NOT NULL default '1',
  `params` text NOT NULL,
  `iscore` tinyint(4) NOT NULL default '0',
  `client_id` tinyint(4) NOT NULL default '0',
  `control` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `published` (`published`,`access`),
  KEY `newsfeeds` (`module`,`published`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=81 ;

--
-- Contenu de la table `hdt_modules`
--

INSERT INTO `hdt_modules` (`id`, `title`, `content`, `ordering`, `position`, `checked_out`, `checked_out_time`, `published`, `module`, `numnews`, `access`, `showtitle`, `params`, `iscore`, `client_id`, `control`) VALUES
(2, 'Login', '', 1, 'login', 0, '0000-00-00 00:00:00', 1, 'mod_login', 0, 0, 1, '', 1, 1, ''),
(3, 'Popular', '', 3, 'cpanel', 0, '0000-00-00 00:00:00', 1, 'mod_popular', 0, 2, 1, '', 0, 1, ''),
(4, 'Recent added Articles', '', 4, 'cpanel', 0, '0000-00-00 00:00:00', 1, 'mod_latest', 0, 2, 1, 'ordering=c_dsc\nuser_id=0\ncache=0\n\n', 0, 1, ''),
(6, 'Unread Messages', '', 1, 'header', 0, '0000-00-00 00:00:00', 1, 'mod_unread', 0, 2, 1, '', 1, 1, ''),
(7, 'Online Users', '', 2, 'header', 0, '0000-00-00 00:00:00', 1, 'mod_online', 0, 2, 1, '', 1, 1, ''),
(8, 'Toolbar', '', 1, 'toolbar', 0, '0000-00-00 00:00:00', 1, 'mod_toolbar', 0, 2, 1, '', 1, 1, ''),
(9, 'Quick Icons', '', 1, 'icon', 0, '0000-00-00 00:00:00', 1, 'mod_quickicon', 0, 2, 1, '', 1, 1, ''),
(10, 'Logged in Users', '', 2, 'cpanel', 0, '0000-00-00 00:00:00', 1, 'mod_logged', 0, 2, 1, '', 0, 1, ''),
(11, 'Footer', '', 0, 'footer', 0, '0000-00-00 00:00:00', 1, 'mod_footer', 0, 0, 1, '', 1, 1, ''),
(12, 'Admin Menu', '', 1, 'menu', 1, '0000-00-00 00:00:00', 1, 'mod_menu', 0, 2, 1, '', 0, 1, ''),
(13, 'Admin SubMenu', '', 1, 'submenu', 0, '0000-00-00 00:00:00', 1, 'mod_submenu', 0, 2, 1, '', 0, 1, ''),
(14, 'User Status', '', 1, 'status', 0, '0000-00-00 00:00:00', 1, 'mod_status', 0, 2, 1, '', 0, 1, ''),
(15, 'Title', '', 1, 'title', 0, '0000-00-00 00:00:00', 1, 'mod_title', 0, 2, 1, '', 0, 1, ''),
(73, 'MENU FOOTER', '', 1, 'menufooter', 0, '0000-00-00 00:00:00', 1, 'mod_mainmenu', 0, 0, 1, 'menutype=mainmenu\nmenu_style=list\nstartLevel=0\nendLevel=0\nshowAllChildren=0\nwindow_open=\nshow_whitespace=0\ncache=1\ntag_id=\nclass_sfx=\nmoduleclass_sfx=\nmaxdepth=10\nmenu_images=0\nmenu_images_align=0\nmenu_images_link=0\nexpand_menu=0\nactivate_parent=0\nfull_active_id=0\nindent_image=0\nindent_image1=\nindent_image2=\nindent_image3=\nindent_image4=\nindent_image5=\nindent_image6=\nspacer=\nend_spacer=\n\n', 0, 0, ''),
(78, 'HỖ TRỢ TRỰC TUYẾN', '', 0, 'suportonline', 0, '0000-00-00 00:00:00', 1, 'mod_support', 0, 0, 1, 'yahooID=email1,email2,email3,email4\nnameYahoo=name1,name2,name3,name4\ntelYahoo=\ntypeYahoo=14\nshowYahoo=1\nskypeID=\nnameSkype=\ntelSkype=\nshowSkype=0\nshowName=1\nshowTel=0\ncache=0\ncache_time=900\n\n', 0, 0, ''),
(51, 'LOGOS TOP', '<p><img src="images/stories/sloga2n.jpg" border="0" /></p>', 1, 'manulogo', 0, '0000-00-00 00:00:00', 1, 'mod_custom', 0, 0, 1, 'moduleclass_sfx=\n\n', 0, 0, ''),
(52, 'TOP SEARCH', '', 0, 'search_pro', 0, '0000-00-00 00:00:00', 1, 'mod_productsearch', 0, 0, 1, 'moduleclass_sfx=\ncache=1\n\n', 0, 0, ''),
(79, 'TITLE TEXT', '<p><span>15 March</span>Sale Off 99%</p>', 0, 'titletext', 0, '0000-00-00 00:00:00', 1, 'mod_custom', 0, 0, 0, 'moduleclass_sfx=\n\n', 0, 0, ''),
(80, 'FOOTER', '<div class="footer"><a class="small-logo">BiBishop</a>\r\n<p class="address">Địa chỉ: 6 Vĩnh Hội, P4, Q4, HCM</p>\r\n<p class="copy">Copyright ©  2010 WAMPvn Co., Ltd</p>\r\n<p class="desgin">Developed by <a href="http://wampvn.com" title="thiet ke web hien dai">WAMP</a></p>\r\n<p class="copy">Email: levanhen@wampvn.com - minhnguyen@wampvn.com</p>\r\n</div>', 0, 'footer', 0, '0000-00-00 00:00:00', 1, 'mod_custom', 0, 0, 1, 'moduleclass_sfx=\n\n', 0, 0, ''),
(77, 'PATHWAY', '', 0, 'breadcrumbs', 0, '0000-00-00 00:00:00', 1, 'mod_breadcrumbs', 0, 0, 1, 'showHome=1\nhomeText=Trang chủ\nshowLast=1\nseparator=\nmoduleclass_sfx=\ncache=0\n\n', 0, 0, ''),
(59, 'PHỤ KIỆN', '', 0, 'right_phukien', 0, '0000-00-00 00:00:00', 1, 'mod_phukien', 0, 0, 1, 'moduleclass_sfx=blue\ncatid=25\nlimit=8\ncache=1\n\n', 0, 0, ''),
(69, 'GIỎ HÀNG CỦA BẠN', '', 0, 'right_cart', 0, '0000-00-00 00:00:00', 1, 'mod_cart', 0, 0, 1, 'moduleclass_sfx=\n\n', 0, 0, ''),
(70, 'SẢN PHẨM MỚI', '', 0, 'new_product', 0, '0000-00-00 00:00:00', 1, 'mod_new_products', 0, 0, 1, 'moduleclass_sfx=\nlimit=30\ncache=1\n\n', 0, 0, ''),
(71, 'SẢN PHẨM XEM NHIỀU', '', 0, 'modleft', 0, '0000-00-00 00:00:00', 1, 'mod_rate_products', 0, 0, 1, 'moduleclass_sfx=\nlimit=8\ncache=1\n\n', 0, 0, ''),
(72, 'MENU TOP', '', 0, 'menutop', 0, '0000-00-00 00:00:00', 1, 'mod_mainmenu', 0, 0, 1, 'menutype=mainmenu\nmenu_style=list\nstartLevel=0\nendLevel=0\nshowAllChildren=0\nwindow_open=\nshow_whitespace=0\ncache=1\ntag_id=\nclass_sfx=\nmoduleclass_sfx=\nmaxdepth=10\nmenu_images=0\nmenu_images_align=0\nmenu_images_link=0\nexpand_menu=0\nactivate_parent=0\nfull_active_id=0\nindent_image=0\nindent_image1=\nindent_image2=\nindent_image3=\nindent_image4=\nindent_image5=\nindent_image6=\nspacer=\nend_spacer=\n\n', 0, 0, ''),
(74, 'Sản phẩm thời trang Nữ mới', '', 0, 'new_female', 0, '0000-00-00 00:00:00', 1, 'mod_new_female', 0, 0, 1, 'moduleclass_sfx=\ncatid=24\nlimit=8\ncache=1\n\n', 0, 0, ''),
(75, 'Sản phẩm thời trang Nam mới', '', 0, 'new_male', 0, '0000-00-00 00:00:00', 1, 'mod_new_male', 0, 0, 1, 'moduleclass_sfx=\ncatid=9\nlimit=8\ncache=1\n\n', 0, 0, ''),
(76, 'TIN TỨC', '', 0, 'right_news', 0, '0000-00-00 00:00:00', 1, 'mod_hotnew', 0, 0, 1, 'moduleclass_sfx=\nshow_front=1\ncount=4\ncatid=6\nsecid=1\ncache=1\ncache_time=900\n\n', 0, 0, '');

-- --------------------------------------------------------

--
-- Structure de la table `hdt_modules_menu`
--

CREATE TABLE IF NOT EXISTS `hdt_modules_menu` (
  `moduleid` int(11) NOT NULL default '0',
  `menuid` int(11) NOT NULL default '0',
  PRIMARY KEY  (`moduleid`,`menuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `hdt_modules_menu`
--

INSERT INTO `hdt_modules_menu` (`moduleid`, `menuid`) VALUES
(51, 0),
(52, 0),
(59, 0),
(69, 0),
(70, 0),
(71, 0),
(72, 0),
(73, 0),
(74, 1),
(75, 1),
(76, 0),
(77, 0),
(78, 0),
(79, 0),
(80, 0);

-- --------------------------------------------------------

--
-- Structure de la table `hdt_plugins`
--

CREATE TABLE IF NOT EXISTS `hdt_plugins` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL default '',
  `element` varchar(100) NOT NULL default '',
  `folder` varchar(100) NOT NULL default '',
  `access` tinyint(3) unsigned NOT NULL default '0',
  `ordering` int(11) NOT NULL default '0',
  `published` tinyint(3) NOT NULL default '0',
  `iscore` tinyint(3) NOT NULL default '0',
  `client_id` tinyint(3) NOT NULL default '0',
  `checked_out` int(11) unsigned NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `params` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `idx_folder` (`published`,`client_id`,`access`,`folder`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=43 ;

--
-- Contenu de la table `hdt_plugins`
--

INSERT INTO `hdt_plugins` (`id`, `name`, `element`, `folder`, `access`, `ordering`, `published`, `iscore`, `client_id`, `checked_out`, `checked_out_time`, `params`) VALUES
(1, 'Authentication - Joomla', 'joomla', 'authentication', 0, 1, 1, 1, 0, 0, '0000-00-00 00:00:00', ''),
(2, 'Authentication - LDAP', 'ldap', 'authentication', 0, 2, 0, 1, 0, 0, '0000-00-00 00:00:00', 'host=\nport=389\nuse_ldapV3=0\nnegotiate_tls=0\nno_referrals=0\nauth_method=bind\nbase_dn=\nsearch_string=\nusers_dn=\nusername=\npassword=\nldap_fullname=fullName\nldap_email=mail\nldap_uid=uid\n\n'),
(3, 'Authentication - GMail', 'gmail', 'authentication', 0, 4, 0, 0, 0, 0, '0000-00-00 00:00:00', ''),
(4, 'Authentication - OpenID', 'openid', 'authentication', 0, 3, 0, 0, 0, 0, '0000-00-00 00:00:00', ''),
(5, 'User - Joomla!', 'joomla', 'user', 0, 0, 1, 0, 0, 0, '0000-00-00 00:00:00', 'autoregister=1\n\n'),
(6, 'Search - Content', 'content', 'search', 0, 1, 1, 1, 0, 0, '0000-00-00 00:00:00', 'search_limit=50\nsearch_content=1\nsearch_uncategorised=1\nsearch_archived=1\n\n'),
(7, 'Search - Contacts', 'contacts', 'search', 0, 3, 1, 1, 0, 0, '0000-00-00 00:00:00', 'search_limit=50\n\n'),
(8, 'Search - Categories', 'categories', 'search', 0, 4, 1, 0, 0, 0, '0000-00-00 00:00:00', 'search_limit=50\n\n'),
(9, 'Search - Sections', 'sections', 'search', 0, 5, 1, 0, 0, 0, '0000-00-00 00:00:00', 'search_limit=50\n\n'),
(10, 'Search - Newsfeeds', 'newsfeeds', 'search', 0, 6, 0, 0, 0, 0, '0000-00-00 00:00:00', 'search_limit=50\n\n'),
(11, 'Search - Weblinks', 'weblinks', 'search', 0, 2, 0, 1, 0, 0, '0000-00-00 00:00:00', 'search_limit=50\n\n'),
(12, 'Content - Pagebreak', 'pagebreak', 'content', 0, 10000, 1, 1, 0, 0, '0000-00-00 00:00:00', 'enabled=1\ntitle=1\nmultipage_toc=1\nshowall=1\n\n'),
(13, 'Content - Rating', 'vote', 'content', 0, 4, 0, 1, 0, 0, '0000-00-00 00:00:00', ''),
(14, 'Content - Email Cloaking', 'emailcloak', 'content', 0, 5, 1, 0, 0, 0, '0000-00-00 00:00:00', 'mode=1\n\n'),
(15, 'Content - Code Hightlighter (GeSHi)', 'geshi', 'content', 0, 5, 0, 0, 0, 0, '0000-00-00 00:00:00', ''),
(16, 'Content - Load Module', 'loadmodule', 'content', 0, 6, 1, 0, 0, 0, '0000-00-00 00:00:00', 'enabled=1\nstyle=0\n\n'),
(17, 'Content - Page Navigation', 'pagenavigation', 'content', 0, 2, 1, 1, 0, 0, '0000-00-00 00:00:00', 'position=1\n\n'),
(18, 'Editor - No Editor', 'none', 'editors', 0, 0, 1, 1, 0, 0, '0000-00-00 00:00:00', ''),
(19, 'Editor - TinyMCE 2.0', 'tinymce', 'editors', 0, 0, 1, 1, 0, 62, '2010-07-08 08:04:04', 'mode=extended\nskin=0\ncompressed=0\ncleanup_startup=1\ncleanup_save=2\nentity_encoding=raw\nlang_mode=0\nlang_code=en\ntext_direction=ltr\ncontent_css=1\ncontent_css_custom=\nrelative_urls=1\nnewlines=0\ninvalid_elements=applet\nextended_elements=\ntoolbar=top\ntoolbar_align=left\nhtml_height=550\nhtml_width=750\nelement_path=1\nfonts=1\npaste=1\nsearchreplace=1\ninsertdate=1\nformat_date=%Y-%m-%d\ninserttime=1\nformat_time=%H:%M:%S\ncolors=1\ntable=1\nsmilies=1\nmedia=1\nhr=1\ndirectionality=1\nfullscreen=1\nstyle=1\nlayer=1\nxhtmlxtras=0\nvisualchars=1\nnonbreaking=1\ntemplate=0\nadvimage=1\nadvlink=1\nautosave=0\ncontextmenu=1\ninlinepopups=1\nsafari=0\ncustom_plugin=\ncustom_button=\n\n'),
(20, 'Editor - XStandard Lite 2.0', 'xstandard', 'editors', 0, 0, 0, 1, 0, 0, '0000-00-00 00:00:00', 'mode=wysiwyg\nwrap=8\n\n'),
(21, 'Editor Button - Image', 'image', 'editors-xtd', 0, 0, 1, 0, 0, 0, '0000-00-00 00:00:00', ''),
(22, 'Editor Button - Pagebreak', 'pagebreak', 'editors-xtd', 0, 0, 1, 0, 0, 0, '0000-00-00 00:00:00', ''),
(23, 'Editor Button - Readmore', 'readmore', 'editors-xtd', 0, 0, 1, 0, 0, 0, '0000-00-00 00:00:00', ''),
(24, 'XML-RPC - Joomla', 'joomla', 'xmlrpc', 0, 7, 0, 1, 0, 0, '0000-00-00 00:00:00', ''),
(25, 'XML-RPC - Blogger API', 'blogger', 'xmlrpc', 0, 7, 0, 1, 0, 0, '0000-00-00 00:00:00', 'catid=1\nsectionid=0\n\n'),
(27, 'System - SEF', 'sef', 'system', 0, 1, 1, 0, 0, 0, '0000-00-00 00:00:00', ''),
(28, 'System - Debug', 'debug', 'system', 0, 2, 1, 0, 0, 0, '0000-00-00 00:00:00', 'queries=1\nmemory=1\nlangauge=1\n\n'),
(29, 'System - Legacy', 'legacy', 'system', 0, 3, 0, 1, 0, 0, '0000-00-00 00:00:00', 'route=0\n\n'),
(30, 'System - Cache', 'cache', 'system', 0, 4, 0, 1, 0, 0, '0000-00-00 00:00:00', 'browsercache=0\ncachetime=15\n\n'),
(31, 'System - Log', 'log', 'system', 0, 5, 0, 1, 0, 0, '0000-00-00 00:00:00', ''),
(32, 'System - Remember Me', 'remember', 'system', 0, 6, 1, 1, 0, 0, '0000-00-00 00:00:00', ''),
(33, 'System - Backlink', 'backlink', 'system', 0, 7, 0, 1, 0, 0, '0000-00-00 00:00:00', ''),
(38, 'Content - Joomla Extra News Plugin', 'extranews', 'content', 0, 0, 1, 0, 0, 0, '0000-00-00 00:00:00', 'enabled=1\ncache=0\nsectionid_list=-\ncatid_list=-\nid_list=-\nqueryby=c_dsc\nchar_count_title=0\nrelateditemscount=0\nneweritemscount=0\noderitemscount=10\nshowdate=1\nshowdateformat=d/m/Y\nlinkedtitleformat=%2$s %1$s\ntextbefore=<hr/>\ntextafter=<hr/>\nmarginleft=2%\nmarginright=2%\nenable_tooltip=no\nscript_tooltip=2\nload_mootools=no\nscriptIE6_tooltip=2\nt_char_count_title=0\nt_char_count_desc=150\ntooltip_desc_images=yes\nimg_width=60\nimg_height=60\ntooltip_width=270\ntooltip_height=120\ntooltip_bgcolor=#fff\ntooltip_capcolor=#ffffff\ntooltip_fgcolor=#fff\ntooltip_textcolor=#5b5b5b\ntooltip_border=1\ntooltip_extra_invocation_string=\njoos_comment=0\n\n'),
(39, 'System - ProductSef', 'productsSef', 'system', 0, 0, 1, 0, 0, 82, '2010-10-09 03:39:41', ''),
(40, 'System - WampSEO', 'WampSEO', 'system', 0, 0, 1, 0, 0, 0, '0000-00-00 00:00:00', 'length=200\ntitorder=0\nseparator=\\|\nfptitle=BiBiShop - Web Shop Thời Trang - Wampvn\nfptitorder=2\nfpdesc=1\ncredittag=0\nlengthofword=3\ncount=20\nblacklist=la, cua, nhung\nregenerateall=1\nusetitleorcontent=0\n\n'),
(41, 'Content - Related Articles Tags', 'relatedarticlestags', 'content', 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', 'limit=5\r\norder=DESC\r\nsection=\r\ncategory=\r\nsectionno=\r\ncategoryno=\r\nnbtool=0\r\nblacklistword='),
(42, 'System - Mootools Upgrade', 'mtupgrade', 'system', 0, 0, 0, 0, 0, 0, '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Structure de la table `hdt_polls`
--

CREATE TABLE IF NOT EXISTS `hdt_polls` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `title` varchar(255) NOT NULL default '',
  `alias` varchar(255) NOT NULL default '',
  `voters` int(9) NOT NULL default '0',
  `checked_out` int(11) NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `published` tinyint(1) NOT NULL default '0',
  `access` int(11) NOT NULL default '0',
  `lag` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `hdt_polls`
--


-- --------------------------------------------------------

--
-- Structure de la table `hdt_poll_data`
--

CREATE TABLE IF NOT EXISTS `hdt_poll_data` (
  `id` int(11) NOT NULL auto_increment,
  `pollid` int(11) NOT NULL default '0',
  `text` text NOT NULL,
  `hits` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `pollid` (`pollid`,`text`(1))
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `hdt_poll_data`
--


-- --------------------------------------------------------

--
-- Structure de la table `hdt_poll_date`
--

CREATE TABLE IF NOT EXISTS `hdt_poll_date` (
  `id` bigint(20) NOT NULL auto_increment,
  `date` datetime NOT NULL default '0000-00-00 00:00:00',
  `vote_id` int(11) NOT NULL default '0',
  `poll_id` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  KEY `poll_id` (`poll_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `hdt_poll_date`
--


-- --------------------------------------------------------

--
-- Structure de la table `hdt_poll_menu`
--

CREATE TABLE IF NOT EXISTS `hdt_poll_menu` (
  `pollid` int(11) NOT NULL default '0',
  `menuid` int(11) NOT NULL default '0',
  PRIMARY KEY  (`pollid`,`menuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `hdt_poll_menu`
--


-- --------------------------------------------------------

--
-- Structure de la table `hdt_sections`
--

CREATE TABLE IF NOT EXISTS `hdt_sections` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(255) NOT NULL default '',
  `name` varchar(255) NOT NULL default '',
  `alias` varchar(255) NOT NULL default '',
  `image` text NOT NULL,
  `scope` varchar(50) NOT NULL default '',
  `image_position` varchar(30) NOT NULL default '',
  `description` text NOT NULL,
  `published` tinyint(1) NOT NULL default '0',
  `checked_out` int(11) unsigned NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `ordering` int(11) NOT NULL default '0',
  `access` tinyint(3) unsigned NOT NULL default '0',
  `count` int(11) NOT NULL default '0',
  `params` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `idx_scope` (`scope`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `hdt_sections`
--

INSERT INTO `hdt_sections` (`id`, `title`, `name`, `alias`, `image`, `scope`, `image_position`, `description`, `published`, `checked_out`, `checked_out_time`, `ordering`, `access`, `count`, `params`) VALUES
(1, 'Tin tức', '', 'tin-tuc', '', 'content', 'left', '', 1, 0, '0000-00-00 00:00:00', 1, 0, 10, '');

-- --------------------------------------------------------

--
-- Structure de la table `hdt_session`
--

CREATE TABLE IF NOT EXISTS `hdt_session` (
  `username` varchar(150) default '',
  `time` varchar(14) default '',
  `session_id` varchar(200) NOT NULL default '0',
  `guest` tinyint(4) default '1',
  `userid` int(11) default '0',
  `usertype` varchar(50) default '',
  `gid` tinyint(3) unsigned NOT NULL default '0',
  `client_id` tinyint(3) unsigned NOT NULL default '0',
  `data` longtext,
  PRIMARY KEY  (`session_id`(64)),
  KEY `whosonline` (`guest`,`usertype`),
  KEY `userid` (`userid`),
  KEY `time` (`time`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `hdt_session`
--

INSERT INTO `hdt_session` (`username`, `time`, `session_id`, `guest`, `userid`, `usertype`, `gid`, `client_id`, `data`) VALUES
('', '1288592785', '7461570ef86a5ba7956dea77b6cef139', 1, 0, '', 0, 0, '__default|a:7:{s:15:"session.counter";i:2;s:19:"session.timer.start";i:1288592775;s:18:"session.timer.last";i:1288592775;s:17:"session.timer.now";i:1288592785;s:22:"session.client.browser";s:75:"Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.2.12) Gecko/20101026";s:8:"registry";O:9:"JRegistry":3:{s:17:"_defaultNameSpace";s:7:"session";s:9:"_registry";a:1:{s:7:"session";a:1:{s:4:"data";O:8:"stdClass":0:{}}}s:7:"_errors";a:0:{}}s:4:"user";O:5:"JUser":19:{s:2:"id";i:0;s:4:"name";N;s:8:"username";N;s:5:"email";N;s:8:"password";N;s:14:"password_clear";s:0:"";s:8:"usertype";N;s:5:"block";N;s:9:"sendEmail";i:0;s:3:"gid";i:0;s:12:"registerDate";N;s:13:"lastvisitDate";N;s:10:"activation";N;s:6:"params";N;s:3:"aid";i:0;s:5:"guest";i:1;s:7:"_params";O:10:"JParameter":7:{s:4:"_raw";s:0:"";s:4:"_xml";N;s:9:"_elements";a:0:{}s:12:"_elementPath";a:1:{i:0;s:98:"/home/wpdemo/domains/wamp.vn/public_html/demo/wp_thoitrang/libraries/joomla/html/parameter/element";}s:17:"_defaultNameSpace";s:8:"_default";s:9:"_registry";a:1:{s:8:"_default";a:1:{s:4:"data";O:8:"stdClass":0:{}}}s:7:"_errors";a:0:{}}s:9:"_errorMsg";N;s:7:"_errors";a:0:{}}}'),
('', '1288596904', '953973c54d45b077ae433cb182cffcf5', 1, 0, '', 0, 0, '__default|a:7:{s:15:"session.counter";i:4;s:19:"session.timer.start";i:1288596874;s:18:"session.timer.last";i:1288596885;s:17:"session.timer.now";i:1288596904;s:22:"session.client.browser";s:75:"Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US; rv:1.9.2.12) Gecko/20101026";s:8:"registry";O:9:"JRegistry":3:{s:17:"_defaultNameSpace";s:7:"session";s:9:"_registry";a:1:{s:7:"session";a:1:{s:4:"data";O:8:"stdClass":0:{}}}s:7:"_errors";a:0:{}}s:4:"user";O:5:"JUser":19:{s:2:"id";i:0;s:4:"name";N;s:8:"username";N;s:5:"email";N;s:8:"password";N;s:14:"password_clear";s:0:"";s:8:"usertype";N;s:5:"block";N;s:9:"sendEmail";i:0;s:3:"gid";i:0;s:12:"registerDate";N;s:13:"lastvisitDate";N;s:10:"activation";N;s:6:"params";N;s:3:"aid";i:0;s:5:"guest";i:1;s:7:"_params";O:10:"JParameter":7:{s:4:"_raw";s:0:"";s:4:"_xml";N;s:9:"_elements";a:0:{}s:12:"_elementPath";a:1:{i:0;s:98:"/home/wpdemo/domains/wamp.vn/public_html/demo/wp_thoitrang/libraries/joomla/html/parameter/element";}s:17:"_defaultNameSpace";s:8:"_default";s:9:"_registry";a:1:{s:8:"_default";a:1:{s:4:"data";O:8:"stdClass":0:{}}}s:7:"_errors";a:0:{}}s:9:"_errorMsg";N;s:7:"_errors";a:0:{}}}'),
('', '1288529997', 'f8747ae06998d7faa50ecd63838e83d1', 1, 0, '', 0, 0, '__default|a:7:{s:15:"session.counter";i:2;s:19:"session.timer.start";i:1288529985;s:18:"session.timer.last";i:1288529985;s:17:"session.timer.now";i:1288529997;s:22:"session.client.browser";s:130:"Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.1; Trident/4.0; SLCC2; .NET CLR 2.0.50727; .NET CLR 3.5.30729; .NET CLR 3.0.30729)";s:8:"registry";O:9:"JRegistry":3:{s:17:"_defaultNameSpace";s:7:"session";s:9:"_registry";a:1:{s:7:"session";a:1:{s:4:"data";O:8:"stdClass":0:{}}}s:7:"_errors";a:0:{}}s:4:"user";O:5:"JUser":19:{s:2:"id";i:0;s:4:"name";N;s:8:"username";N;s:5:"email";N;s:8:"password";N;s:14:"password_clear";s:0:"";s:8:"usertype";N;s:5:"block";N;s:9:"sendEmail";i:0;s:3:"gid";i:0;s:12:"registerDate";N;s:13:"lastvisitDate";N;s:10:"activation";N;s:6:"params";N;s:3:"aid";i:0;s:5:"guest";i:1;s:7:"_params";O:10:"JParameter":7:{s:4:"_raw";s:0:"";s:4:"_xml";N;s:9:"_elements";a:0:{}s:12:"_elementPath";a:1:{i:0;s:98:"/home/wpdemo/domains/wamp.vn/public_html/demo/wp_thoitrang/libraries/joomla/html/parameter/element";}s:17:"_defaultNameSpace";s:8:"_default";s:9:"_registry";a:1:{s:8:"_default";a:1:{s:4:"data";O:8:"stdClass":0:{}}}s:7:"_errors";a:0:{}}s:9:"_errorMsg";N;s:7:"_errors";a:0:{}}}'),
('', '1288679371', 'def2271b5eaaf9bd98eb69f63d939cbd', 1, 0, '', 0, 0, '__default|a:7:{s:15:"session.counter";i:8;s:19:"session.timer.start";i:1288679315;s:18:"session.timer.last";i:1288679355;s:17:"session.timer.now";i:1288679371;s:22:"session.client.browser";s:113:"Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.9.2.12) Gecko/20101026 AlexaToolbar/alxf-1.54 Firefox/3.6.12";s:8:"registry";O:9:"JRegistry":3:{s:17:"_defaultNameSpace";s:7:"session";s:9:"_registry";a:1:{s:7:"session";a:1:{s:4:"data";O:8:"stdClass":0:{}}}s:7:"_errors";a:0:{}}s:4:"user";O:5:"JUser":19:{s:2:"id";i:0;s:4:"name";N;s:8:"username";N;s:5:"email";N;s:8:"password";N;s:14:"password_clear";s:0:"";s:8:"usertype";N;s:5:"block";N;s:9:"sendEmail";i:0;s:3:"gid";i:0;s:12:"registerDate";N;s:13:"lastvisitDate";N;s:10:"activation";N;s:6:"params";N;s:3:"aid";i:0;s:5:"guest";i:1;s:7:"_params";O:10:"JParameter":7:{s:4:"_raw";s:0:"";s:4:"_xml";N;s:9:"_elements";a:0:{}s:12:"_elementPath";a:1:{i:0;s:98:"/home/wpdemo/domains/wamp.vn/public_html/demo/wp_thoitrang/libraries/joomla/html/parameter/element";}s:17:"_defaultNameSpace";s:8:"_default";s:9:"_registry";a:1:{s:8:"_default";a:1:{s:4:"data";O:8:"stdClass":0:{}}}s:7:"_errors";a:0:{}}s:9:"_errorMsg";N;s:7:"_errors";a:0:{}}}shopping_cart|a:1:{i:61;a:6:{s:2:"id";s:2:"61";s:4:"name";s:20:"Áo thời trang 004";s:9:"thumbnail";s:0:"";s:5:"price";s:6:"200000";s:8:"currency";s:4:"VNĐ";s:5:"count";i:4;}}');

-- --------------------------------------------------------

--
-- Structure de la table `hdt_stats_agents`
--

CREATE TABLE IF NOT EXISTS `hdt_stats_agents` (
  `agent` varchar(255) NOT NULL default '',
  `type` tinyint(1) unsigned NOT NULL default '0',
  `hits` int(11) unsigned NOT NULL default '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `hdt_stats_agents`
--


-- --------------------------------------------------------

--
-- Structure de la table `hdt_templates_menu`
--

CREATE TABLE IF NOT EXISTS `hdt_templates_menu` (
  `template` varchar(255) NOT NULL default '',
  `menuid` int(11) NOT NULL default '0',
  `client_id` tinyint(4) NOT NULL default '0',
  PRIMARY KEY  (`menuid`,`client_id`,`template`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `hdt_templates_menu`
--

INSERT INTO `hdt_templates_menu` (`template`, `menuid`, `client_id`) VALUES
('thoitrang', 0, 0),
('khepri', 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `hdt_users`
--

CREATE TABLE IF NOT EXISTS `hdt_users` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL default '',
  `username` varchar(150) NOT NULL default '',
  `email` varchar(100) NOT NULL default '',
  `password` varchar(100) NOT NULL default '',
  `usertype` varchar(25) NOT NULL default '',
  `block` tinyint(4) NOT NULL default '0',
  `sendEmail` tinyint(4) default '0',
  `gid` tinyint(3) unsigned NOT NULL default '1',
  `registerDate` datetime NOT NULL default '0000-00-00 00:00:00',
  `lastvisitDate` datetime NOT NULL default '0000-00-00 00:00:00',
  `activation` varchar(100) NOT NULL default '',
  `params` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `usertype` (`usertype`),
  KEY `idx_name` (`name`),
  KEY `gid_block` (`gid`,`block`),
  KEY `username` (`username`),
  KEY `email` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=83 ;

--
-- Contenu de la table `hdt_users`
--

INSERT INTO `hdt_users` (`id`, `name`, `username`, `email`, `password`, `usertype`, `block`, `sendEmail`, `gid`, `registerDate`, `lastvisitDate`, `activation`, `params`) VALUES
(62, 'Kevin Khoa', 'khoadesign', 'khoadesign@yahoo.com', '42e17a6c0eba92fb06cac1565951ed1c:rMemTV6bDikEafQL0eTm6ZFqYBqmrprI', 'Super Administrator', 0, 1, 25, '2009-04-23 12:10:45', '2010-09-23 09:53:26', 'a9cfcf658af1ae81c33eb1b72bdb22ac', 'admin_language=vi-VN\nlanguage=vi-VN\neditor=tinymce\nhelpsite=\ntimezone=0\n\n'),
(79, 'root', 'root', 'levanhen@wampvn.com', '28ed3280a84db2c81b00356aea114f82:AwATRZZ17KN4OdyDOc2edp8u8apvn9tA', 'Super Administrator', 0, 1, 25, '2010-01-17 07:39:56', '2010-09-01 09:58:48', '', 'language=\ntimezone=0\nadmin_language=vi-VN\neditor=\nhelpsite=\n\n'),
(82, 'admin', 'wamp', 'wam@yahoo.com', '176890e1bd71c8c7fe1ea82ff47cc865:3Gabc331nkmrPb6laOUom7Y5oZxklKXX', 'Super Administrator', 0, 0, 25, '2010-09-23 08:47:43', '2010-10-12 06:38:45', '', 'admin_language=\nlanguage=\neditor=\nhelpsite=\ntimezone=0\n\n');

-- --------------------------------------------------------

--
-- Structure de la table `hdt_w_categories`
--

CREATE TABLE IF NOT EXISTS `hdt_w_categories` (
  `id` int(11) NOT NULL auto_increment,
  `parentid` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `ordering` tinyint(4) NOT NULL,
  `published` tinyint(1) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Contenu de la table `hdt_w_categories`
--

INSERT INTO `hdt_w_categories` (`id`, `parentid`, `name`, `ordering`, `published`) VALUES
(9, 0, 'Thời Trang Nam', 0, 1),
(24, 0, 'Thời Trang Nữ', 0, 1),
(20, 12, 'new cat', 0, 1),
(25, 0, 'Phụ Kiện', 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `hdt_w_comments`
--

CREATE TABLE IF NOT EXISTS `hdt_w_comments` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(30) NOT NULL,
  `comment_title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `date` date NOT NULL,
  `published` tinyint(1) NOT NULL,
  `productid` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `rating` tinyint(1) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Contenu de la table `hdt_w_comments`
--

INSERT INTO `hdt_w_comments` (`id`, `name`, `comment_title`, `content`, `date`, `published`, `productid`, `email`, `rating`) VALUES
(19, 'sonnguyentttttt', '54534543', 'ttttttttttttttttttttttttttttttttttt', '2010-10-04', 1, 45, 'sonnguyen@gmail.com', 5),
(20, 'sonnguyentttttt', 'Danh gia 2 *', 'Danh gia 2 *Danh gia 2 *Danh gia 2 *Danh gia 2 *Danh gia 2 *Danh gia 2 *', '2010-10-05', 1, 45, 'sonnguyen@gmail.com', 2),
(18, 'sonnguyen', '54534543', 'rrewr53454353', '2010-10-04', 1, 44, 'sonnguyen@gmail.com', 4),
(16, 'nhat xet 1', 'nhat xet 1', 'nhat xet 1nhat xet 1nhat xet 1nhat xet 1nhat xet 1nhat xet 1nhat xet 1nhat xet 1nhat xet 1nhat xet 1nhat xet 1nhat xet 1nhat xet 1', '2010-09-23', 1, 41, 'nhatxet@yahoo.com', 3),
(17, 'nhat xet 2', 'nhat xet 2', 'nhat xet 2nhat xet 2nhat xet 2nhat xet 2nhat xet 2nhat xet 2nhat xet 2nhat xet 2nhat xet 2nhat xet 2nhat xet 2nhat xet 2nhat xet 2nhat xet 2nhat xet 2nhat xet 2nhat xet 2nhat xet 2nhat xet 2nhat xet 2nhat xet 2nhat xet 2nhat xet 2nhat xet 2nhat xet 2nhat xet 2nhat xet 2nhat xet 2nhat xet 2nhat xet 2nhat xet 2nhat xet 2nhat xet 2nhat xet 2nhat xet 2nhat xet 2nhat xet 2nhat xet 2nhat xet 2nhat xet 2nhat xet 2', '2010-09-23', 1, 41, 'nhatxet2@yahoo.com', 1),
(21, 'sonnguyen', '54534543', 'erewr wer wer ưerwerew', '2010-10-07', 1, 48, 'sonnguyen@gmail.com', 3),
(22, 'sonnguyentttttt', 'Tiêu deef comment', 'nội dung comment hể sds dfdf dfdsf ds', '2010-10-07', 1, 48, 'lmsolonelynex@yahoo.com', 4);

-- --------------------------------------------------------

--
-- Structure de la table `hdt_w_images`
--

CREATE TABLE IF NOT EXISTS `hdt_w_images` (
  `id` int(11) NOT NULL auto_increment,
  `proid` int(11) NOT NULL,
  `filename` varchar(255) character set utf8 NOT NULL,
  `ordering` int(11) NOT NULL,
  `isdefault` tinyint(4) NOT NULL,
  `published` tinyint(4) NOT NULL default '1',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=112 ;

--
-- Contenu de la table `hdt_w_images`
--

INSERT INTO `hdt_w_images` (`id`, `proid`, `filename`, `ordering`, `isdefault`, `published`) VALUES
(67, 44, 'image1xxl4.jpg', 0, 1, 1),
(83, 46, 'A9209 red1.jpg', 0, 1, 1),
(69, 40, 'image1xxl5.jpg', 0, 1, 1),
(66, 45, 'image1xxl.jpg', 0, 1, 1),
(68, 41, 'image1xxl7.jpg', 0, 1, 1),
(81, 47, 'A9209 green2.jpg', 0, 1, 1),
(76, 49, 'A9214-white1.jpg', 0, 1, 1),
(93, 53, 'image1xxl111.jpg', 0, 1, 1),
(96, 51, 'image1xxlfdf.jpg', 0, 1, 1),
(95, 52, 'image1xxlgfgf.jpg', 0, 1, 1),
(80, 49, 'A9214-white3.jpg', 0, 0, 1),
(79, 49, 'A9214-white2.jpg', 0, 0, 1),
(78, 48, 'B063-pink1.jpg', 0, 1, 1),
(98, 50, 'image1xxlhhhh.jpg', 0, 1, 1),
(70, 54, 'image1xxl10.jpg', 0, 1, 1),
(71, 55, 'image1xxl9.jpg', 0, 1, 1),
(72, 56, 'image1xx3l.jpg', 0, 1, 1),
(73, 57, 'image1xxl6.jpg', 0, 1, 1),
(74, 58, 'image1xxl11.jpg', 0, 1, 1),
(75, 59, 'image1xxl12.jpg', 0, 1, 1),
(77, 60, 'B075-black1(2).jpg', 0, 1, 1),
(82, 47, 'A9209 green1.jpg', 0, 0, 1),
(84, 46, 'A9209 red2.jpg', 0, 0, 1),
(85, 61, 'A9205-dblue1.jpg', 0, 1, 1),
(86, 62, 'B103 gray1.jpg', 0, 1, 1),
(87, 62, 'B103 gray.jpg', 0, 0, 1),
(88, 63, 'A8082 white.jpg', 0, 1, 1),
(89, 63, 'A8082 white2.jpg', 0, 0, 1),
(90, 64, 'B051 Dgreen.jpg', 0, 1, 1),
(91, 64, 'B051 green1.jpg', 0, 0, 1),
(92, 65, 'C179-purple1.jpg', 0, 1, 1),
(94, 53, 'image3xxl.jpg', 0, 0, 1),
(97, 51, 'image3xxlhg.jpg', 0, 0, 1),
(104, 68, 'image1xxlrtrt.jpg', 0, 1, 1),
(103, 66, 'image1xxlttt.jpg', 0, 1, 1),
(106, 67, 'image2xxlfdfd.jpg', 0, 0, 1),
(105, 67, 'image1xxlfdfdfdf.jpg', 0, 1, 1),
(107, 69, 'image1xxliiii.jpg', 0, 1, 1),
(108, 70, 'image1xxlhtyt.jpg', 0, 1, 1),
(109, 70, 'hhgh.jpg', 0, 0, 1),
(110, 71, 'image1xxlgfg.jpg', 0, 1, 1),
(111, 71, 'image4xxl.jpg', 0, 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `hdt_w_label`
--

CREATE TABLE IF NOT EXISTS `hdt_w_label` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `ordering` tinyint(4) NOT NULL,
  `published` tinyint(1) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `hdt_w_label`
--

INSERT INTO `hdt_w_label` (`id`, `name`, `image`, `ordering`, `published`) VALUES
(2, 'Style 2', 'green.gif', 0, 1),
(3, 'Style 3', 'violet.gif', 0, 1),
(5, 'Style4', 'pink.gif', 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `hdt_w_manufacturers`
--

CREATE TABLE IF NOT EXISTS `hdt_w_manufacturers` (
  `id` int(11) NOT NULL auto_increment,
  `description` text NOT NULL,
  `name` varchar(50) NOT NULL,
  `ordering` tinyint(4) NOT NULL,
  `published` tinyint(1) NOT NULL,
  `image` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `hdt_w_manufacturers`
--

INSERT INTO `hdt_w_manufacturers` (`id`, `description`, `name`, `ordering`, `published`, `image`) VALUES
(1, '', 'BlackBerry', 0, 1, ''),
(2, '', 'Apple', 0, 1, ''),
(3, '', 'Nokia', 0, 1, '');

-- --------------------------------------------------------

--
-- Structure de la table `hdt_w_newsletter`
--

CREATE TABLE IF NOT EXISTS `hdt_w_newsletter` (
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Contenu de la table `hdt_w_newsletter`
--

INSERT INTO `hdt_w_newsletter` (`id`, `subject`, `header`, `message`, `html_message`, `published`, `check_out`, `check_out_time`, `publish_up`, `publish_down`, `created`, `send`, `hits`, `sender`, `limit`, `cat_id`) VALUES
(1, 'Thu Quang Cao', 'Thu Quang Cao', 'test', 'test tet', 1, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2009-05-25 13:05:39', '2009-05-28 00:00:09', 37, 'levanhen01@yahoo.com', 2, 2),
(3, 'NEWSLETTER - tpl', 'NEWSLETTER - tpl', 'YOUR LETTER CONTENT ................ YOUR LETTER CONTENT ................ YOUR LETTER CONTENT ................ YOUR LETTER CONTENT ................ YOUR LETTER CONTENT ................ YOUR LETTER CONTENT ................ ', '<div class="letter_body" style="background:url(templates/wp_hangdientu/images/bg.gif) repeat scroll 0 0 #FFFFFF; 			color:#5B5B5B; 			font-size:12px; 			margin:0; 			padding:0; 			text-align:center; 			font-family:arial, tahoma;"><!-- DIV WARP -->\r\n<div style="text-align: left; margin: 0pt auto; width: 720px; background: url(images/newsletter/lt_bd.jpg) repeat-y scroll center top transparent;">\r\n<div style="margin: 0pt auto; width: 720px; background: url(images/newsletter/lt_bot.jpg) no-repeat scroll center bottom transparent;">\r\n<div style="margin: 0pt auto; width: 720px; background: url(images/newsletter/lt_top.jpg) no-repeat scroll center top transparent;"><!-- LETTER CONTENT -->\r\n<div style="padding:15px 20px; color:#5B5B5B; font-family:arial, tahoma;"><!--HEADER--> \r\n<table style="width: 100%;" border="0" cellspacing="0" cellpadding="0">\r\n<tbody>\r\n<tr>\r\n<td align="left" valign="top"><a href="undefined/"> <img src="images/stories/logo_bbsaigon.jpg" border="0" alt="logo_bbsaigon" /> </a></td>\r\n<td style="font-size:12px; color:#5B5B5B;" align="right" valign="top"><strong> Gọi ngay 0903.183.183 | <a href="undefined/" style="color:#5B5B5B; text-decoration:none;">BBSaigon.com</a> </strong></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<div style="height: 10px; border-top: 1px solid #cccccc;"></div>\r\n<!--END: HEADER--> <!--YOUR LETTER CONTENT-->\r\n<div style="font-size:12px; color:#5B5B5B;"><!--  COPY HERE ..... ---> \r\n<table style="width: 100%;" border="0" cellspacing="0" cellpadding="0">\r\n<tbody>\r\n<tr>\r\n<td style="font-size:12px; color:#5B5B5B;" align="left" valign="top">YOUR LETTER CONTENT ................ 					YOUR LETTER CONTENT ................ 					YOUR LETTER CONTENT ................ 					YOUR LETTER CONTENT ................ 					YOUR LETTER CONTENT ................ 					YOUR LETTER CONTENT ................</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n</div>\r\n<!--END: YOUR LETTER CONTENT--> <!-- FOOTER -->\r\n<div class="clearfix">\r\n<p align="center"><a href="undefined/" style="color:#5B5B5B; text-decoration:none;">Trang chủ</a> <span style="color: #005cdf;">|</span> <a href="gioi-thieu.html" style="color:#5B5B5B; text-decoration:none;">Giới thiệu</a> <span style="color: #005cdf;">|</span> <a href="cach-mua-hang.html" style="color:#5B5B5B; text-decoration:none;">Cách mua hàng</a> <span style="color: #005cdf;">|</span> <a href="bao-hanh.html" style="color:#5B5B5B; text-decoration:none;">Bảo hành</a> <span style="color: #005cdf;">|</span> <a href="hoi-dap.html" style="color:#5B5B5B; text-decoration:none;">Hỏi đáp</a> <span style="color: #005cdf;">|</span> <a href="dieu-khoan-su-dung.html" style="color:#5B5B5B; text-decoration:none;">Điều khoản sử dụng</a> <span style="color: #005cdf;">|</span> <a href="lien-he.html" style="color:#5B5B5B; text-decoration:none;">Liên hệ</a></p>\r\n</div>\r\n<div><small> Copyright © 2007 - 2010 BBsaigon.com</small></div>\r\n<!--END: FOOTER --></div>\r\n<!-- END: LETTER CONTENT --></div>\r\n</div>\r\n</div>\r\n<!-- END: DIV WARP --></div>\r\n<!--END: LETTER BODY -->', 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2010-07-05 09:07:53', '0000-00-00 00:00:00', 0, 'test@wampvn.com', 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `hdt_w_newsletter_categories`
--

CREATE TABLE IF NOT EXISTS `hdt_w_newsletter_categories` (
  `id` int(11) NOT NULL auto_increment,
  `parent_id` int(11) NOT NULL default '0',
  `name` varchar(30) NOT NULL,
  `description` varchar(250) default NULL,
  `ordering` int(11) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `hdt_w_newsletter_categories`
--

INSERT INTO `hdt_w_newsletter_categories` (`id`, `parent_id`, `name`, `description`, `ordering`) VALUES
(1, 0, 'Default', 'default', 0);

-- --------------------------------------------------------

--
-- Structure de la table `hdt_w_newsletter_contacts`
--

CREATE TABLE IF NOT EXISTS `hdt_w_newsletter_contacts` (
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
-- Contenu de la table `hdt_w_newsletter_contacts`
--

INSERT INTO `hdt_w_newsletter_contacts` (`id`, `subscriber_id`, `company`, `phone`, `address`, `hobby`, `note`) VALUES
(1, 1, 'Tu Van Kiem Dinh', '0986083735', '640 Le Trong Tan', 'du lich', 'khach hang tim nang');

-- --------------------------------------------------------

--
-- Structure de la table `hdt_w_newsletter_subscribers`
--

CREATE TABLE IF NOT EXISTS `hdt_w_newsletter_subscribers` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL default '0',
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `confirmed` tinyint(1) NOT NULL default '0',
  `date` datetime NOT NULL default '0000-00-00 00:00:00',
  `cat_id` varchar(5) NOT NULL default '0',
  PRIMARY KEY  (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

--
-- Contenu de la table `hdt_w_newsletter_subscribers`
--

INSERT INTO `hdt_w_newsletter_subscribers` (`id`, `user_id`, `name`, `email`, `confirmed`, `date`, `cat_id`) VALUES
(18, 0, 'khách', 'khoadesign@yahoo.com', 1, '2010-06-24 00:00:00', '0'),
(17, 0, 'khách', 'hen@yahoo.com', 1, '2010-06-24 00:00:00', '0'),
(19, 0, 'khách', 'fafaff@ssds.vn', 0, '2010-07-02 00:00:00', '0'),
(20, 0, 'khách', 'levanhen@wampvn.com', 0, '2010-07-02 00:00:00', '0'),
(21, 0, 'khách', 'khoa@wampvn.com', 0, '2010-07-02 00:00:00', '0'),
(22, 0, 'khách', 'hghgghj@kkkj.cn', 0, '2010-07-02 00:00:00', '0'),
(23, 0, 'khách', 'jghjjhj@hhjhjh.cn', 0, '2010-07-02 00:00:00', '0'),
(24, 0, 'khách', 'ffafade@sffds.cb', 0, '2010-07-02 00:00:00', '0'),
(25, 0, 'khách', 'dfdfd@ffffsfs.vn', 0, '2010-07-02 00:00:00', '0'),
(26, 0, 'khách', 'hungng@yahoo.com', 0, '2010-07-05 00:00:00', '0'),
(27, 0, 'khách', 'soansha@yahoo.com', 0, '2010-07-06 00:00:00', '0'),
(28, 0, 'khách', 'dhydfhdfdf@fggtsdgd.vn', 0, '2010-07-06 00:00:00', '0');

-- --------------------------------------------------------

--
-- Structure de la table `hdt_w_orders`
--

CREATE TABLE IF NOT EXISTS `hdt_w_orders` (
  `id` int(11) NOT NULL auto_increment,
  `name` text NOT NULL,
  `address` text NOT NULL,
  `sex` tinyint(2) NOT NULL,
  `email` text NOT NULL,
  `phone` text NOT NULL,
  `cartinfo` text NOT NULL,
  `userid` int(11) NOT NULL,
  `message` text NOT NULL,
  `status` tinyint(4) NOT NULL default '0',
  `published` tinyint(1) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

--
-- Contenu de la table `hdt_w_orders`
--

INSERT INTO `hdt_w_orders` (`id`, `name`, `address`, `sex`, `email`, `phone`, `cartinfo`, `userid`, `message`, `status`, `published`, `date`) VALUES
(6, 'he dieu hanh', 'phuong 6 q4', 1, 'sonnguyen@gmail.com', '202020220', '0lau x 1<br/>Canh Bắp Cải x 4<br/>Canh Chua x 8<br/>', 0, 'dsfdsfsfsfsffs', 2, 0, '2010-10-01'),
(4, 'sonnguyen', 'phuong 6 q4', 1, 'sonnguyen@gmail.com', '202020220', '0lau x 14<br/>Canh Chua x 1<br/>Canh Bắp Cải x 1<br/>', 0, 'dsfdsfsfdsffsdfffffffffffffffffffffffffffffffff', 0, 1, '2010-09-29'),
(25, 'sonnguyen', 'phuong 6 q4', 0, 'sonnguyen@gmail.com', '202020220', '0Túi xách dành cho phái nữ xx x 2<br/>Giầy dành cho Nam x 1<br/>', 0, '', 0, 0, '2010-10-08'),
(26, 'sonnguyen', '', 0, 'sonnguyen@gmail.com', '202020220', '0Áo thun nữ x 1<br/>', 0, 'ghfghfghfghfgh gfh fghfg', 0, 0, '2010-10-08'),
(27, 'sonnguyen', 'phuong 6 q4', 0, 'sonnguyen@gmail.com', '202020220', '0Túi xách dành cho phái đẹp 9000 x 1<br/>', 0, 'fdsfsddsfdsfds fdsfd sf sdfd sfd f sfsd', 0, 0, '2010-10-09'),
(28, 'sonnguyen', 'phuong 6 q4', 0, 'sonnguyen@gmail.com', '202020220', '0Áo cộc tay x 2<br/>', 0, 'rew rwerwe rew', 0, 0, '2010-10-09');

-- --------------------------------------------------------

--
-- Structure de la table `hdt_w_products`
--

CREATE TABLE IF NOT EXISTS `hdt_w_products` (
  `id` int(11) NOT NULL auto_increment,
  `catid` int(11) NOT NULL,
  `groupid` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `code` varchar(10) NOT NULL,
  `originalprice` varchar(50) NOT NULL,
  `saleprice` varchar(50) NOT NULL,
  `monitorsize` varchar(5) NOT NULL,
  `currency` varchar(3) NOT NULL,
  `intro` text NOT NULL,
  `shortdesc` text NOT NULL,
  `description` text NOT NULL,
  `thumbnail` varchar(150) NOT NULL,
  `mediumimage` text NOT NULL,
  `largeimage1` varchar(180) NOT NULL,
  `stock` tinyint(1) NOT NULL default '1',
  `date` date NOT NULL,
  `weight` varchar(20) NOT NULL,
  `ordering` int(11) NOT NULL,
  `hits` int(11) NOT NULL,
  `published` tinyint(1) NOT NULL,
  `manufacturerid` int(11) NOT NULL,
  `dealerid` int(11) NOT NULL,
  `frontpage` tinyint(1) NOT NULL,
  `frontid` int(2) NOT NULL,
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
  `product_include` varchar(250) NOT NULL,
  `rating` varchar(10) NOT NULL,
  `warranty` varchar(200) NOT NULL,
  `promotion` varchar(200) NOT NULL,
  `video` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `status1` varchar(50) NOT NULL,
  `prp_8` text,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=72 ;

--
-- Contenu de la table `hdt_w_products`
--

INSERT INTO `hdt_w_products` (`id`, `catid`, `groupid`, `name`, `code`, `originalprice`, `saleprice`, `monitorsize`, `currency`, `intro`, `shortdesc`, `description`, `thumbnail`, `mediumimage`, `largeimage1`, `stock`, `date`, `weight`, `ordering`, `hits`, `published`, `manufacturerid`, `dealerid`, `frontpage`, `frontid`, `largeimage2`, `largeimage3`, `largeimage4`, `largeimage5`, `largeimage6`, `largeimage7`, `largeimage8`, `largeimage9`, `largeimage10`, `largeimage11`, `largeimage12`, `largeimage13`, `largeimage14`, `largeimage15`, `largeimage16`, `largeimage17`, `largeimage18`, `product_include`, `rating`, `warranty`, `promotion`, `video`, `status`, `status1`, `prp_8`) VALUES
(40, 9, 17, 'Áo sơmi 001', 'BB40', '0', '1200000', '', 'VNĐ', '<p>thời trang nam</p>', '<p>Mang phong cách thời trang, trẻ trung</p>', '', 'blackberry-9700-rogers.jpg', '', '', 1, '2010-07-01', '', 0, 54, 1, 1, 1, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '6 tháng', 'icon_hot.png', '<div style="text-align: center;">\r\n<object width="589" height="355" data="http://www.youtube.com/v/Yfz6SPeRRmc&amp;hl=en_US&amp;fs=1&amp;color1=0x3a3a3a&amp;color2=0x999999" type="application/x-shockwave-flash">\r\n<param name="allowFullScreen" value="true" />\r\n<param name="allowscriptaccess" value="always" />\r\n<param name="src" value="http://www.youtube.com/v/Yfz6SPeRRmc&amp;hl=en_US&amp;fs=1&amp;color1=0x3a3a3a&amp;color2=0x999999" />\r\n<param name="allowfullscreen" value="true" />\r\n</object>\r\n<br /><span style="color: #888888;">Khám phá BlackBerry Bold 2 9700<br /><br /></span> \r\n<object width="589" height="355" data="http://www.youtube.com/v/xAqdl3orTCU&amp;hl=en_US&amp;fs=1&amp;color1=3a3a3a&amp;color2=999999" type="application/x-shockwave-flash">\r\n<param name="allowFullScreen" value="true" />\r\n<param name="allowscriptaccess" value="always" />\r\n<param name="src" value="http://www.youtube.com/v/xAqdl3orTCU&amp;hl=en_US&amp;fs=1&amp;color1=3a3a3a&amp;color2=999999" />\r\n<param name="allowfullscreen" value="true" />\r\n</object>\r\n<span style="color: #888888;"><br />Nhận xét về BlackBeryry Bold 9700 của Cnet<br /><br /></span></div>\r\n<div style="text-align: center;">\r\n<object width="589" height="355" data="http://www.youtube.com/v/0UVl2nYVqN4&amp;hl=en_US&amp;fs=1&amp;" type="application/x-shockwave-flash">\r\n<param name="allowFullScreen" value="true" />\r\n<param name="allowscriptaccess" value="always" />\r\n<param name="src" value="http://www.youtube.com/v/0UVl2nYVqN4&amp;hl=en_US&amp;fs=1&amp;" />\r\n<param name="allowfullscreen" value="true" />\r\n</object>\r\n<br /><span style="color: #888888;">Đập hộp BlackBerry Bold 9700 Rogers</span></div>', 'Còn hàng', '', ''),
(54, 9, 0, 'Áo khoác nam 001', 'BB54', '', '2000000', '', 'VNĐ', '<p>áo khoác thời trang cho nam giới</p>', '<p>Mang phong cách thời trang, trẻ trung</p>', '', '', '', '', 1, '2010-10-11', '', 0, 13, 1, 1, 0, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', 'hết hàng', '', 'L'),
(55, 9, 0, 'Áo khoác nam 002', 'BB55', '', '900000', '', 'VNĐ', '<p>Áo khoác nam</p>', '<p>Mang phong cách thời trang, trẻ trung</p>', '', '', '', '', 1, '2010-10-11', '', 0, 10, 1, 3, 0, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', 'Hết hàng', '', 'M'),
(56, 9, 0, 'Áo khoác nam 003', 'BB56', '', '800000', '', 'VNĐ', '<p>Áo khoác nam</p>', '<p>Mang phong cách thời trang, năng động</p>', '', '', '', '', 1, '2010-10-11', '', 0, 8, 1, 3, 0, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '3', '', '', '', 'Sắp có hàng', '', 'M'),
(45, 9, 0, 'Áo thời trang Nam', 'BB45', '', '930000', '', 'VNĐ', '<p>Áo nam thời trang</p>', '<p>Mang phong cách thời trang, trẻ trung</p>', '', '', '', '', 1, '2010-10-04', '', 0, 45, 1, 1, 0, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '6 tháng', '', '<div style="text-align: center;">\r\n<object width="589" height="355" data="http://www.youtube.com/v/Yfz6SPeRRmc&amp;hl=en_US&amp;fs=1&amp;color1=0x3a3a3a&amp;color2=0x999999" type="application/x-shockwave-flash">\r\n<param name="allowFullScreen" value="true" />\r\n<param name="allowscriptaccess" value="always" />\r\n<param name="src" value="http://www.youtube.com/v/Yfz6SPeRRmc&amp;hl=en_US&amp;fs=1&amp;color1=0x3a3a3a&amp;color2=0x999999" />\r\n<param name="allowfullscreen" value="true" />\r\n</object>\r\n<br /><span style="color: #888888;">Khám phá BlackBerry Bold 2 9700<br /><br /></span> \r\n<object width="589" height="355" data="http://www.youtube.com/v/xAqdl3orTCU&amp;hl=en_US&amp;fs=1&amp;color1=3a3a3a&amp;color2=999999" type="application/x-shockwave-flash">\r\n<param name="allowFullScreen" value="true" />\r\n<param name="allowscriptaccess" value="always" />\r\n<param name="src" value="http://www.youtube.com/v/xAqdl3orTCU&amp;hl=en_US&amp;fs=1&amp;color1=3a3a3a&amp;color2=999999" />\r\n<param name="allowfullscreen" value="true" />\r\n</object>\r\n<span style="color: #888888;"><br />Nhận xét về BlackBeryry Bold 9700 của Cnet<br /><br /></span></div>\r\n<div style="text-align: center;">\r\n<object width="589" height="355" data="http://www.youtube.com/v/0UVl2nYVqN4&amp;hl=en_US&amp;fs=1&amp;" type="application/x-shockwave-flash">\r\n<param name="allowFullScreen" value="true" />\r\n<param name="allowscriptaccess" value="always" />\r\n<param name="src" value="http://www.youtube.com/v/0UVl2nYVqN4&amp;hl=en_US&amp;fs=1&amp;" />\r\n<param name="allowfullscreen" value="true" />\r\n</object>\r\n<br /><span style="color: #888888;">Đập hộp BlackBerry Bold 9700 Rogers</span></div>', 'Còn hàng', '', 'L'),
(41, 9, 17, 'Áo thun nam 002', 'BB41', '0', '9300000', '', 'VNĐ', '<p>thời trang nam</p>', '<p>Mang phong cách thời trang, trẻ trung</p>', '', '1187597.jpg', '', '', 1, '2010-07-01', '', 0, 39, 1, 1, 1, 1, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '6 tháng', '', '<div style="text-align: center;">\r\n<object width="589" height="355" data="http://www.youtube.com/v/Yfz6SPeRRmc&amp;hl=en_US&amp;fs=1&amp;color1=0x3a3a3a&amp;color2=0x999999" type="application/x-shockwave-flash">\r\n<param name="allowFullScreen" value="true" />\r\n<param name="allowscriptaccess" value="always" />\r\n<param name="src" value="http://www.youtube.com/v/Yfz6SPeRRmc&amp;hl=en_US&amp;fs=1&amp;color1=0x3a3a3a&amp;color2=0x999999" />\r\n<param name="allowfullscreen" value="true" />\r\n</object>\r\n<br /><span style="color: #888888;">Khám phá BlackBerry Bold 2 9700<br /><br /></span> \r\n<object width="589" height="355" data="http://www.youtube.com/v/xAqdl3orTCU&amp;hl=en_US&amp;fs=1&amp;color1=3a3a3a&amp;color2=999999" type="application/x-shockwave-flash">\r\n<param name="allowFullScreen" value="true" />\r\n<param name="allowscriptaccess" value="always" />\r\n<param name="src" value="http://www.youtube.com/v/xAqdl3orTCU&amp;hl=en_US&amp;fs=1&amp;color1=3a3a3a&amp;color2=999999" />\r\n<param name="allowfullscreen" value="true" />\r\n</object>\r\n<span style="color: #888888;"><br />Nhận xét về BlackBeryry Bold 9700 của Cnet<br /><br /></span></div>\r\n<div style="text-align: center;">\r\n<object width="589" height="355" data="http://www.youtube.com/v/0UVl2nYVqN4&amp;hl=en_US&amp;fs=1&amp;" type="application/x-shockwave-flash">\r\n<param name="allowFullScreen" value="true" />\r\n<param name="allowscriptaccess" value="always" />\r\n<param name="src" value="http://www.youtube.com/v/0UVl2nYVqN4&amp;hl=en_US&amp;fs=1&amp;" />\r\n<param name="allowfullscreen" value="true" />\r\n</object>\r\n<br /><span style="color: #888888;">Đập hộp BlackBerry Bold 9700 Rogers</span></div>', 'Sắp có hàng', '', 'M'),
(57, 9, 0, 'Áo khoác nam 004', 'BB57', '', '1500000', '', 'VNĐ', '<p>thời trang nam</p>', '<p>Mang phong cách thời trang, trẻ trung</p>', '', '', '', '', 1, '2010-10-11', '', 0, 6, 1, 1, 0, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '5', '', '', '', 'Còn hàng', '', 'M'),
(58, 9, 0, 'Áo sơmi 002', 'BB58', '', '300000', '', 'VNĐ', '<p>Mang phong cách thời trang</p>', '<p>Áo sơmi  với nhiều màu cho bạn lực chọn</p>', '', '', '', '', 1, '2010-10-11', '', 0, 7, 1, 1, 0, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', 'Còn hàng', '', ''),
(59, 9, 0, 'Áo sơmi 003', 'BB59', '', '150000', '', 'VNĐ', '<p>Áo sơmi với nhiều màu cho bạn chọn</p>', '<p>Mang phong cách thời trang, năng động</p>', '', '', '', '', 1, '2010-10-11', '', 0, 7, 1, 1, 0, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', 'Hết hàng', '', ''),
(49, 24, 0, 'Áo thời trang 001', 'BB49', '', '2000000', '', 'VNĐ', '<p>Áo thời trang</p>', '<p>Mang phong cách thời trang, trẻ trung</p>', '', '', '', '', 1, '2010-10-06', '', 0, 15, 1, 3, 0, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '1', '6 tháng', '', '<div style="text-align: center;">\r\n<object width="589" height="355" data="http://www.youtube.com/v/Yfz6SPeRRmc&amp;hl=en_US&amp;fs=1&amp;color1=0x3a3a3a&amp;color2=0x999999" type="application/x-shockwave-flash">\r\n<param name="allowFullScreen" value="true" />\r\n<param name="allowscriptaccess" value="always" />\r\n<param name="src" value="http://www.youtube.com/v/Yfz6SPeRRmc&amp;hl=en_US&amp;fs=1&amp;color1=0x3a3a3a&amp;color2=0x999999" />\r\n<param name="allowfullscreen" value="true" />\r\n</object>\r\n<br /><span style="color: #888888;">Khám phá BlackBerry Bold 2 9700<br /><br /></span> \r\n<object width="589" height="355" data="http://www.youtube.com/v/xAqdl3orTCU&amp;hl=en_US&amp;fs=1&amp;color1=3a3a3a&amp;color2=999999" type="application/x-shockwave-flash">\r\n<param name="allowFullScreen" value="true" />\r\n<param name="allowscriptaccess" value="always" />\r\n<param name="src" value="http://www.youtube.com/v/xAqdl3orTCU&amp;hl=en_US&amp;fs=1&amp;color1=3a3a3a&amp;color2=999999" />\r\n<param name="allowfullscreen" value="true" />\r\n</object>\r\n<span style="color: #888888;"><br />Nhận xét về BlackBeryry Bold 9700 của Cnet<br /><br /></span></div>\r\n<div style="text-align: center;">\r\n<object width="589" height="355" data="http://www.youtube.com/v/0UVl2nYVqN4&amp;hl=en_US&amp;fs=1&amp;" type="application/x-shockwave-flash">\r\n<param name="allowFullScreen" value="true" />\r\n<param name="allowscriptaccess" value="always" />\r\n<param name="src" value="http://www.youtube.com/v/0UVl2nYVqN4&amp;hl=en_US&amp;fs=1&amp;" />\r\n<param name="allowfullscreen" value="true" />\r\n</object>\r\n<br /><span style="color: #888888;">Đập hộp BlackBerry Bold 9700 Rogers</span></div>', 'Sắp có hàng', 'còn hàng', ''),
(60, 24, 0, 'Áo thời trang 002', 'BB60', '', '2000000', '', 'VNĐ', '<p>Đầm dạ tiệc</p>', '<p>Mang phong cách thời trang, trẻ trung</p>', '', '', '', '', 1, '2010-10-11', '', 0, 6, 1, 1, 0, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', 'Còn hàng', '', 'M'),
(65, 24, 0, 'Đầm dạo phố', 'BB65', '', '250000', '', 'VNĐ', '<p>Trẻ trung , duyên dáng</p>', '<p>Chất liệu Chiffon</p>', '', '', '', '', 1, '2010-10-11', '', 0, 4, 1, 1, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', 'Còn hàng', '', 'M'),
(44, 9, 0, 'Áo thun nam 001', 'BB44', '', '1000000', '', 'VNĐ', '<p>thời trang nam</p>', '<p>Mang phong cách thời trang, trẻ trung</p>', '', 'Windows7_startscreen_web2-728-75.jpg', '', '', 1, '2010-10-02', '', 0, 133, 1, 3, 0, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '1', '6 tháng', '', '<div style="text-align: center;">\r\n<object width="589" height="355" data="http://www.youtube.com/v/Yfz6SPeRRmc&amp;hl=en_US&amp;fs=1&amp;color1=0x3a3a3a&amp;color2=0x999999" type="application/x-shockwave-flash">\r\n<param name="allowFullScreen" value="true" />\r\n<param name="allowscriptaccess" value="always" />\r\n<param name="src" value="http://www.youtube.com/v/Yfz6SPeRRmc&amp;hl=en_US&amp;fs=1&amp;color1=0x3a3a3a&amp;color2=0x999999" />\r\n<param name="allowfullscreen" value="true" />\r\n</object>\r\n<br /><span style="color: #888888;">Khám phá BlackBerry Bold 2 9700<br /><br /></span> \r\n<object width="589" height="355" data="http://www.youtube.com/v/xAqdl3orTCU&amp;hl=en_US&amp;fs=1&amp;color1=3a3a3a&amp;color2=999999" type="application/x-shockwave-flash">\r\n<param name="allowFullScreen" value="true" />\r\n<param name="allowscriptaccess" value="always" />\r\n<param name="src" value="http://www.youtube.com/v/xAqdl3orTCU&amp;hl=en_US&amp;fs=1&amp;color1=3a3a3a&amp;color2=999999" />\r\n<param name="allowfullscreen" value="true" />\r\n</object>\r\n<span style="color: #888888;"><br />Nhận xét về BlackBeryry Bold 9700 của Cnet<br /><br /></span></div>\r\n<div style="text-align: center;">\r\n<object width="589" height="355" data="http://www.youtube.com/v/0UVl2nYVqN4&amp;hl=en_US&amp;fs=1&amp;" type="application/x-shockwave-flash">\r\n<param name="allowFullScreen" value="true" />\r\n<param name="allowscriptaccess" value="always" />\r\n<param name="src" value="http://www.youtube.com/v/0UVl2nYVqN4&amp;hl=en_US&amp;fs=1&amp;" />\r\n<param name="allowfullscreen" value="true" />\r\n</object>\r\n<br /><span style="color: #888888;">Đập hộp BlackBerry Bold 9700 Rogers</span></div>', 'Còn hàng', '', 'L'),
(46, 24, 0, 'Áo thời trang 003', 'BB46', '', '350000', '', 'VNĐ', '<p>Áo thời trang, chất liệu nhẹ</p>', '<p>Mang phong cách trẻ trung</p>', '', '', '', '', 1, '2010-10-06', '', 0, 17, 1, 1, 0, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', 'Hết hàng', '1', 'Đủ size'),
(47, 24, 0, 'Áo thun nữ', 'BB47', '', '900000', '', 'VNĐ', '<p>Thời trang, trẻ đẹp</p>', '<p>Mang phong cách thời trang, trẻ trung</p>', '', '', '', '', 1, '2010-10-06', '', 0, 11, 1, 1, 0, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', 'Hết hàng', '', 'Đủ size'),
(48, 24, 0, 'Đầm dạ tiệc', 'BB48', '', '2000000', '', 'VNĐ', '<p>Đầm quyến rũ</p>', '<p>Mang phong cách thời trang, trẻ trung</p>', '', '', '', '', 1, '2010-10-06', '', 0, 325, 1, 2, 0, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '1', '6 tháng', '', '<div style="text-align: center;">\r\n<object width="589" height="355" data="http://www.youtube.com/v/Yfz6SPeRRmc&amp;hl=en_US&amp;fs=1&amp;color1=0x3a3a3a&amp;color2=0x999999" type="application/x-shockwave-flash">\r\n<param name="allowFullScreen" value="true" />\r\n<param name="allowscriptaccess" value="always" />\r\n<param name="src" value="http://www.youtube.com/v/Yfz6SPeRRmc&amp;hl=en_US&amp;fs=1&amp;color1=0x3a3a3a&amp;color2=0x999999" />\r\n<param name="allowfullscreen" value="true" />\r\n</object>\r\n<br /><span style="color: #888888;">Khám phá BlackBerry Bold 2 9700<br /><br /></span> \r\n<object width="589" height="355" data="http://www.youtube.com/v/xAqdl3orTCU&amp;hl=en_US&amp;fs=1&amp;color1=3a3a3a&amp;color2=999999" type="application/x-shockwave-flash">\r\n<param name="allowFullScreen" value="true" />\r\n<param name="allowscriptaccess" value="always" />\r\n<param name="src" value="http://www.youtube.com/v/xAqdl3orTCU&amp;hl=en_US&amp;fs=1&amp;color1=3a3a3a&amp;color2=999999" />\r\n<param name="allowfullscreen" value="true" />\r\n</object>\r\n<span style="color: #888888;"><br />Nhận xét về BlackBeryry Bold 9700 của Cnet<br /><br /></span></div>\r\n<div style="text-align: center;">\r\n<object width="589" height="355" data="http://www.youtube.com/v/0UVl2nYVqN4&amp;hl=en_US&amp;fs=1&amp;" type="application/x-shockwave-flash">\r\n<param name="allowFullScreen" value="true" />\r\n<param name="allowscriptaccess" value="always" />\r\n<param name="src" value="http://www.youtube.com/v/0UVl2nYVqN4&amp;hl=en_US&amp;fs=1&amp;" />\r\n<param name="allowfullscreen" value="true" />\r\n</object>\r\n<br /><span style="color: #888888;">Đập hộp BlackBerry Bold 9700 Rogers</span></div>', 'Còn hàng', '', 'có đủ các loại cho Nam và nữ ^^'),
(61, 24, 0, 'Áo thời trang 004', 'BB61', '', '200000', '', 'VNĐ', '<p>Thời trang năng động</p>', '<p>100% Cotton</p>', '', '', '', '', 1, '2010-10-11', '', 0, 17, 1, 3, 0, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', 'Còn hàng', '', 'Đủ size'),
(62, 24, 0, 'Áo thời trang', 'BB62', '', '200000', '', 'VNĐ', '<p>Năng động, trẻ trung</p>', '<p>100% cotton, duy nhất chỉ có màu xám</p>', '', '', '', '', 1, '2010-10-11', '', 0, 5, 1, 1, 0, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', 'icon_hot.png', '', 'còn hàng', '', 'M'),
(63, 24, 0, 'Áo thun 001', 'BB63', '', '250000', '', 'VNĐ', '<p>Trẻ trung, năng động</p>', '<p>100% cotton</p>', '', '', '', '', 1, '2010-10-11', '', 0, 6, 1, 1, 0, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Áo khoác', '', '', '', '', 'Còn hàng', '', 'Đủ size'),
(64, 24, 0, 'Đầm dạ tiệc', 'BB64', '', '250000', '', 'VNĐ', '<p>Trẻ trung, năng động</p>', '<p>Chất liệu Cotton</p>', '', '', '', '', 1, '2010-10-11', '', 0, 3, 1, 1, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', 'Hết hàng', '', ''),
(50, 25, 0, 'Túi xách', 'BB50', '', '250000', '', 'VNĐ', '<p>Nhỏ, gọn</p>', '<p>Thích hợp để các bạn năng động, chất liệu da tốt</p>', '', '', '', '', 1, '2010-10-07', '', 0, 39, 1, 3, 0, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '1', '6 tháng', '', '<div style="text-align: center;">\r\n<object width="589" height="355" data="http://www.youtube.com/v/Yfz6SPeRRmc&amp;hl=en_US&amp;fs=1&amp;color1=0x3a3a3a&amp;color2=0x999999" type="application/x-shockwave-flash">\r\n<param name="allowFullScreen" value="true" />\r\n<param name="allowscriptaccess" value="always" />\r\n<param name="src" value="http://www.youtube.com/v/Yfz6SPeRRmc&amp;hl=en_US&amp;fs=1&amp;color1=0x3a3a3a&amp;color2=0x999999" />\r\n<param name="allowfullscreen" value="true" />\r\n</object>\r\n<br /><span style="color: #888888;">Khám phá BlackBerry Bold 2 9700<br /><br /></span> \r\n<object width="589" height="355" data="http://www.youtube.com/v/xAqdl3orTCU&amp;hl=en_US&amp;fs=1&amp;color1=3a3a3a&amp;color2=999999" type="application/x-shockwave-flash">\r\n<param name="allowFullScreen" value="true" />\r\n<param name="allowscriptaccess" value="always" />\r\n<param name="src" value="http://www.youtube.com/v/xAqdl3orTCU&amp;hl=en_US&amp;fs=1&amp;color1=3a3a3a&amp;color2=999999" />\r\n<param name="allowfullscreen" value="true" />\r\n</object>\r\n<span style="color: #888888;"><br />Nhận xét về BlackBeryry Bold 9700 của Cnet<br /><br /></span></div>\r\n<div style="text-align: center;">\r\n<object width="589" height="355" data="http://www.youtube.com/v/0UVl2nYVqN4&amp;hl=en_US&amp;fs=1&amp;" type="application/x-shockwave-flash">\r\n<param name="allowFullScreen" value="true" />\r\n<param name="allowscriptaccess" value="always" />\r\n<param name="src" value="http://www.youtube.com/v/0UVl2nYVqN4&amp;hl=en_US&amp;fs=1&amp;" />\r\n<param name="allowfullscreen" value="true" />\r\n</object>\r\n<br /><span style="color: #888888;">Đập hộp BlackBerry Bold 9700 Rogers</span></div>', 'Hết hàng', '', ''),
(66, 25, 0, 'Đồng hồ thời trang', 'BB66', '', '500000', '', 'VNĐ', '<p>Kiểu dáng thời trang</p>', '<p>Đồng hồ cho phái nữ</p>', '', '', '', '', 1, '2010-10-11', '', 0, 1, 1, 1, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', 'Còn hàng', '', ''),
(67, 25, 0, 'Đồng hồ thời trang', 'BB67', '', '900000', '', 'VNĐ', '<p>Thời trang</p>', '<p>Đồng hồ cho phái nữ</p>', '', '', '', '', 1, '2010-10-11', '', 0, 1, 1, 1, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '6 tháng', '', '', 'Còn hàng', '', ''),
(68, 25, 0, 'Đồng hồ thời trang 001', 'BB68', '', '800000', '', 'VNĐ', '<p>Sang trọng, quý phái</p>', '<p>Đồng hồ thời trang cho nữ</p>', '', '', '', '', 1, '2010-10-11', '', 0, 2, 1, 1, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', '', 'Hết hàng', ''),
(69, 25, 0, 'Giày 001', 'BB69', '', '1200000', '', 'VNĐ', '<p>Giày da cao cấp</p>', '<p>Chất liệu da mềm, thạo cảm giác thoải mái khi di chuyển</p>', '', '', '', '', 1, '2010-10-12', '', 0, 12, 1, 1, 0, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', 'Hàng sắp về', '', ''),
(70, 25, 0, 'Giày 002', 'BB70', '', '890000', '', 'VNĐ', '<p>Giày tuyên tuyến</p>', '<p>Giày búp bê có đính kèm tuyên tuyến</p>', '', '', '', '', 1, '2010-10-12', '', 0, 13, 1, 2, 0, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', 'Còn hàng', '', ''),
(51, 25, 0, 'Túi xách dành cho phái đẹp', 'BB51', '', '200000', '', 'VNĐ', '<p>Nhỏ, gọn</p>', '<p>Thích hợp cho các bạn năng động</p>', '', '', '', '', 1, '2010-10-07', '', 0, 47, 1, 3, 0, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '1', '6 tháng', '', '<div style="text-align: center;">\r\n<object width="589" height="355" data="http://www.youtube.com/v/Yfz6SPeRRmc&amp;hl=en_US&amp;fs=1&amp;color1=0x3a3a3a&amp;color2=0x999999" type="application/x-shockwave-flash">\r\n<param name="allowFullScreen" value="true" />\r\n<param name="allowscriptaccess" value="always" />\r\n<param name="src" value="http://www.youtube.com/v/Yfz6SPeRRmc&amp;hl=en_US&amp;fs=1&amp;color1=0x3a3a3a&amp;color2=0x999999" />\r\n<param name="allowfullscreen" value="true" />\r\n</object>\r\n<br /><span style="color: #888888;">Khám phá BlackBerry Bold 2 9700<br /><br /></span> \r\n<object width="589" height="355" data="http://www.youtube.com/v/xAqdl3orTCU&amp;hl=en_US&amp;fs=1&amp;color1=3a3a3a&amp;color2=999999" type="application/x-shockwave-flash">\r\n<param name="allowFullScreen" value="true" />\r\n<param name="allowscriptaccess" value="always" />\r\n<param name="src" value="http://www.youtube.com/v/xAqdl3orTCU&amp;hl=en_US&amp;fs=1&amp;color1=3a3a3a&amp;color2=999999" />\r\n<param name="allowfullscreen" value="true" />\r\n</object>\r\n<span style="color: #888888;"><br />Nhận xét về BlackBeryry Bold 9700 của Cnet<br /><br /></span></div>\r\n<div style="text-align: center;">\r\n<object width="589" height="355" data="http://www.youtube.com/v/0UVl2nYVqN4&amp;hl=en_US&amp;fs=1&amp;" type="application/x-shockwave-flash">\r\n<param name="allowFullScreen" value="true" />\r\n<param name="allowscriptaccess" value="always" />\r\n<param name="src" value="http://www.youtube.com/v/0UVl2nYVqN4&amp;hl=en_US&amp;fs=1&amp;" />\r\n<param name="allowfullscreen" value="true" />\r\n</object>\r\n<br /><span style="color: #888888;">Đập hộp BlackBerry Bold 9700 Rogers</span></div>', 'Mới 100%', 'còn hàng', ''),
(71, 25, 0, 'Dép 001', 'BB71', '', '350000', '', 'VNĐ', '<p>Dép dây</p>', '<p>Loại dây cao cấp, không gây đau chân, thạo cảm giác thoải mái</p>', '', '', '', '', 1, '2010-10-12', '', 0, 6, 1, 2, 0, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', 'Còn hàng', '', 'Đủ size'),
(52, 25, 0, 'Túi xách dành cho phái đẹp', 'BB52', '', '300000', '', 'VNĐ', '<p>Nhỏ, gọn</p>', '<p>Nhẹ, thích hợp cho những bạn năng động</p>', '', '', '', '', 1, '2010-10-07', '', 0, 59, 1, 3, 0, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '1', '6 tháng', '', '<div style="text-align: center;">\r\n<object width="589" height="355" data="http://www.youtube.com/v/Yfz6SPeRRmc&amp;hl=en_US&amp;fs=1&amp;color1=0x3a3a3a&amp;color2=0x999999" type="application/x-shockwave-flash">\r\n<param name="allowFullScreen" value="true" />\r\n<param name="allowscriptaccess" value="always" />\r\n<param name="src" value="http://www.youtube.com/v/Yfz6SPeRRmc&amp;hl=en_US&amp;fs=1&amp;color1=0x3a3a3a&amp;color2=0x999999" />\r\n<param name="allowfullscreen" value="true" />\r\n</object>\r\n<br /><span style="color: #888888;">Khám phá BlackBerry Bold 2 9700<br /><br /></span> \r\n<object width="589" height="355" data="http://www.youtube.com/v/xAqdl3orTCU&amp;hl=en_US&amp;fs=1&amp;color1=3a3a3a&amp;color2=999999" type="application/x-shockwave-flash">\r\n<param name="allowFullScreen" value="true" />\r\n<param name="allowscriptaccess" value="always" />\r\n<param name="src" value="http://www.youtube.com/v/xAqdl3orTCU&amp;hl=en_US&amp;fs=1&amp;color1=3a3a3a&amp;color2=999999" />\r\n<param name="allowfullscreen" value="true" />\r\n</object>\r\n<span style="color: #888888;"><br />Nhận xét về BlackBeryry Bold 9700 của Cnet<br /><br /></span></div>\r\n<div style="text-align: center;">\r\n<object width="589" height="355" data="http://www.youtube.com/v/0UVl2nYVqN4&amp;hl=en_US&amp;fs=1&amp;" type="application/x-shockwave-flash">\r\n<param name="allowFullScreen" value="true" />\r\n<param name="allowscriptaccess" value="always" />\r\n<param name="src" value="http://www.youtube.com/v/0UVl2nYVqN4&amp;hl=en_US&amp;fs=1&amp;" />\r\n<param name="allowfullscreen" value="true" />\r\n</object>\r\n<br /><span style="color: #888888;">Đập hộp BlackBerry Bold 9700 Rogers</span></div>', 'Mới 100%', 'Còn hàng', ''),
(53, 25, 0, 'Túi xách 001', 'BB53', '', '500000', '', 'VNĐ', '<p>Ba lô</p>', '<p>Ba lô</p>', '', '', '', '', 1, '2010-10-07', '', 0, 23, 1, 3, 0, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '1', '6 tháng', '', '<div style="text-align: center;">\r\n<object width="589" height="355" data="http://www.youtube.com/v/Yfz6SPeRRmc&amp;hl=en_US&amp;fs=1&amp;color1=0x3a3a3a&amp;color2=0x999999" type="application/x-shockwave-flash">\r\n<param name="allowFullScreen" value="true" />\r\n<param name="allowscriptaccess" value="always" />\r\n<param name="src" value="http://www.youtube.com/v/Yfz6SPeRRmc&amp;hl=en_US&amp;fs=1&amp;color1=0x3a3a3a&amp;color2=0x999999" />\r\n<param name="allowfullscreen" value="true" />\r\n</object>\r\n<br /><span style="color: #888888;">Khám phá BlackBerry Bold 2 9700<br /><br /></span> \r\n<object width="589" height="355" data="http://www.youtube.com/v/xAqdl3orTCU&amp;hl=en_US&amp;fs=1&amp;color1=3a3a3a&amp;color2=999999" type="application/x-shockwave-flash">\r\n<param name="allowFullScreen" value="true" />\r\n<param name="allowscriptaccess" value="always" />\r\n<param name="src" value="http://www.youtube.com/v/xAqdl3orTCU&amp;hl=en_US&amp;fs=1&amp;color1=3a3a3a&amp;color2=999999" />\r\n<param name="allowfullscreen" value="true" />\r\n</object>\r\n<span style="color: #888888;"><br />Nhận xét về BlackBeryry Bold 9700 của Cnet<br /><br /></span></div>\r\n<div style="text-align: center;">\r\n<object width="589" height="355" data="http://www.youtube.com/v/0UVl2nYVqN4&amp;hl=en_US&amp;fs=1&amp;" type="application/x-shockwave-flash">\r\n<param name="allowFullScreen" value="true" />\r\n<param name="allowscriptaccess" value="always" />\r\n<param name="src" value="http://www.youtube.com/v/0UVl2nYVqN4&amp;hl=en_US&amp;fs=1&amp;" />\r\n<param name="allowfullscreen" value="true" />\r\n</object>\r\n<br /><span style="color: #888888;">Đập hộp BlackBerry Bold 9700 Rogers</span></div>', 'Mới 100%', 'còn hàng', '');

-- --------------------------------------------------------

--
-- Structure de la table `hdt_w_product_label`
--

CREATE TABLE IF NOT EXISTS `hdt_w_product_label` (
  `id` int(11) NOT NULL auto_increment,
  `proid` int(11) NOT NULL,
  `lblid` int(11) NOT NULL,
  PRIMARY KEY  (`id`,`proid`,`lblid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=146 ;

--
-- Contenu de la table `hdt_w_product_label`
--

INSERT INTO `hdt_w_product_label` (`id`, `proid`, `lblid`) VALUES
(1, 6, 1),
(2, 6, 2),
(4, 5, 1),
(10, 4, 1),
(11, 4, 2),
(13, 2, 2),
(15, 5, 3),
(16, 3, 3),
(17, 1, 3),
(26, 6, 3),
(27, 6, 5),
(35, 5, 5),
(36, 3, 1),
(37, 3, 2),
(38, 2, 1),
(39, 11, 1),
(40, 11, 2),
(41, 12, 1),
(42, 12, 2),
(43, 13, 1),
(44, 13, 2),
(45, 14, 1),
(46, 14, 2),
(47, 15, 1),
(48, 15, 2),
(49, 15, 3),
(50, 15, 5),
(51, 16, 1),
(52, 16, 2),
(53, 16, 3),
(54, 7, 1),
(55, 7, 2),
(56, 7, 3),
(57, 7, 5),
(58, 17, 1),
(59, 17, 2),
(60, 17, 3),
(61, 17, 5),
(62, 18, 1),
(63, 18, 2),
(64, 18, 3),
(65, 18, 5),
(66, 8, 1),
(67, 8, 2),
(68, 8, 3),
(69, 8, 5),
(70, 20, 1),
(71, 20, 2),
(72, 20, 3),
(73, 20, 5),
(74, 21, 1),
(75, 21, 2),
(76, 21, 3),
(77, 21, 5),
(78, 22, 1),
(79, 22, 2),
(80, 22, 3),
(81, 22, 5),
(82, 23, 1),
(83, 23, 2),
(84, 23, 3),
(85, 23, 5),
(86, 24, 1),
(87, 24, 2),
(88, 24, 3),
(89, 24, 5),
(90, 25, 1),
(91, 25, 2),
(92, 25, 3),
(93, 25, 5),
(94, 26, 1),
(95, 26, 2),
(96, 26, 3),
(97, 26, 5),
(98, 27, 1),
(99, 27, 2),
(100, 27, 3),
(101, 27, 5),
(102, 28, 1),
(103, 28, 2),
(104, 28, 3),
(105, 28, 5),
(106, 29, 1),
(107, 29, 2),
(108, 29, 3),
(109, 29, 5),
(110, 30, 1),
(111, 30, 2),
(112, 30, 3),
(113, 30, 5),
(114, 31, 1),
(115, 31, 2),
(116, 31, 3),
(117, 31, 5),
(118, 32, 1),
(119, 32, 2),
(120, 32, 3),
(121, 32, 5),
(122, 33, 1),
(123, 33, 2),
(124, 33, 3),
(125, 33, 5),
(126, 34, 1),
(127, 34, 2),
(128, 34, 3),
(129, 34, 5),
(130, 35, 1),
(131, 35, 2),
(132, 35, 3),
(133, 35, 5),
(134, 36, 1),
(135, 36, 2),
(136, 36, 3),
(137, 36, 5),
(138, 37, 1),
(139, 37, 2),
(140, 37, 3),
(141, 37, 5),
(142, 13, 3),
(143, 13, 5),
(144, 38, 2),
(145, 38, 5);

-- --------------------------------------------------------

--
-- Structure de la table `hdt_w_property`
--

CREATE TABLE IF NOT EXISTS `hdt_w_property` (
  `id` int(11) NOT NULL auto_increment,
  `label` varchar(200) character set utf8 NOT NULL,
  `datatype` varchar(20) character set utf8 NOT NULL,
  `ordering` int(11) NOT NULL default '1',
  `published` tinyint(1) NOT NULL default '0',
  `created` datetime NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Contenu de la table `hdt_w_property`
--

INSERT INTO `hdt_w_property` (`id`, `label`, `datatype`, `ordering`, `published`, `created`) VALUES
(8, 'Size', 'Plan Text', 6, 1, '2010-10-02 12:40:25');

-- --------------------------------------------------------

--
-- Structure de la table `hdt_w_users`
--

CREATE TABLE IF NOT EXISTS `hdt_w_users` (
  `id` int(11) NOT NULL auto_increment,
  `userid` int(11) NOT NULL,
  `sex` tinyint(1) NOT NULL,
  `address` varchar(250) NOT NULL,
  `city` varchar(25) NOT NULL,
  `tel` varchar(20) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `userid` (`userid`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Contenu de la table `hdt_w_users`
--

INSERT INTO `hdt_w_users` (`id`, `userid`, `sex`, `address`, `city`, `tel`) VALUES
(2, 65, 1, 'SG', 'SG', '0903183183'),
(4, 67, 1, '640 le trong tan', 'ho chi minh', '0986073735'),
(5, 68, 1, 'te', 'es', 'ad'),
(6, 69, 1, 'asd', 'da', 'dsa'),
(7, 70, 1, 'asd', 'da', 'dsa'),
(8, 71, 1, 'asd', 'da', 'dsa'),
(9, 72, 1, 'asd', 'da', 'dsa'),
(10, 73, 1, 'asd', 'da', 'dsa'),
(11, 74, 1, 'fda', 'dsa', 'a'),
(12, 75, 1, 't', 'd', 'd'),
(13, 76, 1, 'da', 'ds', 's'),
(14, 77, 1, 'd', 'd', 'd'),
(15, 78, 1, 's', 's', 's'),
(17, 0, 1, '', '', '');
