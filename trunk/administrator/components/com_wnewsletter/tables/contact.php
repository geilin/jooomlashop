<?php
/**
* @version		1.0
* @package	Component Administrator wNewsLetter
* @copyright	Wampvn Group
* @license		GNU/GPL
* @website          http://wampvn.com
* @description    table contact.
*/

// no direct access
defined('_JEXEC') or die('Restricted access');
class TableContact extends JTable{
	var $id = null;
	var $subscriber_id = null;
	var $company = null;	
	var $phone = null;
	var $address = null;
	var $hobby = null;
	var $note = null;	
	function __construct(&$db){
		parent::__construct('#__w_newsletter_contacts', 'id', $db);
	}
	
}
?>