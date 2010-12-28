<?php
//CatSelect//
/**
* CatSelect Module
* @package Joomla
* @copyright Copyright (C) Kulendra Janaka. All rights reserved.
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
* Joomla! is free software and parts of it may contain or be derived from the
* GNU General Public License or other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/
 
defined('_JEXEC') or die('Restricted access');

// Include the syndicate functions only once
require_once ('modules/mod_simple_banner/helper.php');

$banner_html = modSimpleBannersHelper::renderBanner($params);

require(JModuleHelper::getLayoutPath('mod_simple_banner'));