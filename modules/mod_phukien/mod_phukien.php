<?php
/**
* @version		1.0  - 	Joomla 1.5.x
* @package	Module Categories Products
* @copyright	Wampvn Group
* @license		GNU/GPL
* @website          http://wampvn.com
* @description    index.
*/

// no direct access
defined('_JEXEC') or die('Restricted access');

// Include the syndicate functions only once
require_once ('modules/mod_phukien/helper.php');
$phukien = modPhukienHelper::getPhukien($params);

require(JModuleHelper::getLayoutPath('mod_phukien'));


?>
