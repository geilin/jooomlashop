<?php
/**
* @version		1.0  - 	Joomla 1.5.x
* @package	Component Administrator Com Products
* @copyright	Wampvn Group
* @license		GNU/GPL
* @website          http://wampvn.com
* @description    table comment.
*/

// no direct access
defined('_JEXEC') or die('Restricted access');
class TableComment extends JTable{
	var $id = null;
	var $productid = null;
	var $name = null;
	var $comment_title = null;		
	var $email = null;
	var $content = null;
	var $rating = null;
	var $date = null;
	var $published = null;
	function __construct(&$db){
		parent::__construct('#__w_comments', 'id', $db);
	}
	
}
?>