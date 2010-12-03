<?php
/**
* @version		1.0
* @package	Component Administrator wNewsLetter
* @copyright	Wampvn Group
* @license		GNU/GPL
* @website          http://wampvn.com
* @description    table subscript.
*/

// no direct access
defined('_JEXEC') or die('Restricted access');
class TableSubscriber extends JTable{
	var $id = null;
	var $user_id = null;
	var $name = null;
	var $email = null;
	var $date = null;
	var $comfirmed = null;

	function __construct(&$db){
		parent::__construct('#__w_newsletter_subscribers', 'id', $db);
	}
	
}
?>