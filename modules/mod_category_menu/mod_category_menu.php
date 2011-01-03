<?php
/**
* Category Menu Module
* @package Joomla
* @copyright Copyright (C) Kulendra Janaka. All rights reserved.
* @license http://www.gnu.org/copyleft/gpl.html GNU/GPL, see LICENSE.php
* Joomla! is free software and parts of it may contain or be derived from the
* GNU General Public License or other free or open source software licenses.
* See COPYRIGHT.php for copyright notices and details.
*/
 
defined('_JEXEC') or die('Restricted access');
global $mainframe;


require_once ('modules/mod_category_menu/helper.php');

$categories = modCategoryMenuHelper::generateCategoryList($params);

require(JModuleHelper::getLayoutPath('mod_category_menu'));
