<?php
/**
* @version		$Id: mod_breadcrumbs.php 14401 2010-01-26 14:10:00Z louis $
* @package		Joomla
* @copyright	Copyright (C) 2005 - 2010 Open Source Matters. All rights reserved.
* @license		GNU/GPL, see LICENSE.php
* Joomla! is free software. This version may have been modified pursuant
* to the GNU General Public License, and as distributed it includes or
* is derivative of works licensed under the GNU General Public License or
* other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/

// no direct access
defined('_JEXEC') or die('Restricted access');

// Include the syndicate functions only once
require_once (dirname(__FILE__).DS.'helper.php');

// Get the breadcrumbs
$product	= modBreadCrumbsHelper::getList($params);
$count	= count($product);

// Set the default separator
$separator = modBreadCrumbsHelper::setSeparator( $params->get( 'separator' ));

require(JModuleHelper::getLayoutPath('mod_breadcrumbs'));