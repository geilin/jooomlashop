<?php
/**
* @version		1.0  - 	Joomla 1.5.x
* @package		Module Cat Menu Products
* @copyright	Wampvn Group
* @license		GNU/GPL
* @website          http://wampvn.com
* @description    index.

*/

// no direct access
defined('_JEXEC') or die('Restricted access');

// Include the syndicate functions only once
// require_once ('modules/mod_phukienmenu/helper.php');
//$catmenus = modPhuKienMenuHelper::getPhuKienMenu(&$params);
require_once ('modules/mod_phukienmenu/helper.php');
$catmenus = array();
$menua = '';
$menua = modPhuKienMenuHelper::getTreeAss(0, $catmenus, $menua);
require(JModuleHelper::getLayoutPath('mod_phukienmenu'));

?>

