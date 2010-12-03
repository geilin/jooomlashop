<?php
/**
* @version		1.0  - 	Joomla 1.5.x
* @package	Component Administrator Com Products
* @copyright	Wampvn Group
* @license		GNU/GPL
* @website          http://wampvn.com
* @description    table category.
*/

// no direct access
defined('_JEXEC') or die('Restricted access');
class TableCategory extends JTable{
	var $id = null;
	var $parentid = null;
	var $name = null;
	var $ordering = null;
	var $published = null;
	
	function __construct(&$db){
		$i = 0;
		parent::__construct('#__w_categories', 'id', $db);
	}
	
}
?>