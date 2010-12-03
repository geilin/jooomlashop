<?php
/**
* @version		1.0  - 	Joomla 1.5.x
* @package	Component Administrator Com Products
* @copyright	Wampvn Group
* @license		GNU/GPL
* @website          http://wampvn.com
* @description    table order.
*/

// no direct access
defined('_JEXEC') or die('Restricted access');
class TableOrder extends JTable{
	var $id = null;
	var $name = null;
	var $address = null;
	var $sex = null;
	var $email = null;
	var $phone = null;
	var $cartinfo = null;
	var $userid = null;
	var $status = null;		
	var $message = null;
	var $date = null;
	var $published = null;
	function __construct(&$db){
		parent::__construct('#__w_orders', 'id', $db);
	}
	
}
?>