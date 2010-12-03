<?php
/**
* @version		1.0  - 	Joomla 1.5.x
* @package	Component Administrator Com WUser
* @copyright	Wampvn Group
* @license		GNU/GPL
* @website          http://wampvn.com
* @description    table user.
*/

// no direct access
defined('_JEXEC') or die('Restricted access');
class TableUser extends JTable{
	var $id = null;
	var $userid = null;	
	var $sex = null;
	var $address = null;
	var $city = null;
	var $tel = null;	
	function __construct(&$db){
		parent::__construct('#__w_users', 'id', $db);
	}
	
}
?>