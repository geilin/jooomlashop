<?php
/**
* @version		1.0
* @package	Component Administrator wNewsLetter
* @copyright	Wampvn Group
* @license		GNU/GPL
* @website          http://wampvn.com
* @description    table newsletter
*/

// no direct access
defined('_JEXEC') or die('Restricted access');
class TableNewsLetter extends JTable{
	var $id = null;
	var $subject = null;
	var $header = null;
	var $message = null;
	var $html_message = null;
	var $published = null;
	var $check_out = null;
	var $check_out_time = null;
	var $publish_up = null;
	var $publish_down = null;
	var $created = null;
	var $send = null;
	var $hits = 0;	
	var $sender = null;
	var $limit = 0;
	var $cat_id = 1;
	function __construct(&$db){
		parent::__construct('#__w_newsletter', 'id', $db);
	}
	
}
?>