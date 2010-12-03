<?php
/**
* @version		1.0
* @package		Component Administrator wNewsLetter
* @copyright	Wampvn Group
* @license		GNU/GPL
* @website          http://wampvn.com
* @description    table category.
*/

// no direct access
defined('_JEXEC') or die('Restricted access');
class TableCategory extends JTable{
	var $id = null;
	var $parent_id = null;
	var $name = null;
	var $description = null;	
	var $ordering = 0;

	function __construct(&$db){
		parent::__construct('#__w_newsletter_categories', 'id', $db);
	}
	
}
?>