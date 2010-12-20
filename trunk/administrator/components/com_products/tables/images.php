<?php
// no direct access
defined('_JEXEC') or die('Restricted access');
class TableImages extends JTable{
	var $id 		= null;
	var $proid 		= null;
	var $filename 	= null;
	var $ordering 	= null;
	var $isdefault 	= null;
	var $published 	= null;
	
	function __construct(&$db){
		parent::__construct('#__w_images', 'id', $db);
	}	
}