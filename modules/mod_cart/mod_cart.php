<?php
/**
* @version		1.0  - 	Joomla 1.5.x
* @package	Module Cart Products
* @copyright	Wampvn Group
* @license		GNU/GPL
* @website          http://wampvn.com
* @description    index.
*/

// no direct access
defined('_JEXEC') or die('Restricted access');

// Include the syndicate functions only once
require_once ('components/com_products/shopping_cart.class.php');
session_start();
$Cart = new Shopping_Cart('shopping_cart');

require(JModuleHelper::getLayoutPath('mod_cart'));


?>
