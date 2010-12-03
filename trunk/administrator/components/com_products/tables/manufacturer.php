<?php
/**
* @version		1.0  - 	Joomla 1.5.x
* @package	Component Administrator Com Products
* @copyright	Wampvn Group
* @license		GNU/GPL
* @website          http://wampvn.com
* @description    table manufacturer.
*/

// no direct access
defined('_JEXEC') or die('Restricted access');
class TableManufacturer extends JTable{
	var $id = null;	
	var $name = null;
	var $description = null;
	Var $image = null;
	var $ordering = null;
	var $published = null;


	function __construct(&$db){
		parent::__construct('#__w_manufacturers', 'id', $db);
	}
	
}
?>