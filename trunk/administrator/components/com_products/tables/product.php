<?php
// no direct access
defined('_JEXEC') or die('Restricted access');
class TableProduct extends JTable{
	var $id 			= null;
	var $catid 			= null;	
	var $manufacturerid = null;
	var $groupid 		= null;
	var $dealerid 		= null;
	var $name 			= null;
	var $code 			= null;
	var $originalprice 	= null;
	var $saleprice 		= null;
	var $monitorsize 	= null;
	var $currency 		= null;
	var $intro 			= null;
	var $shortdesc 		= null;
	var $description 	= null;
	var $thumbnail 		= null;
	var $mediumimage	= null;
	var $stock 			= 1;
	var $date 			= null;
	var $weight 		= null;
	var $ordering 		= null;
	var $hits 			= null;
	var $published 		= null;
	var $frontpage 		= null;
	var $frontid 		= null;
	
	var $product_include 	= null;
	var $rating 			= null;	
	var $warranty 			= null;
	var $promotion 			= null;
	var $video				= null;
	var $status				= null;
	var $status1			= null;
	
	var $material = null;
	var $impedance = null;
	var $frequency = null;
	var $connector = null;
	var $driver = null;
	var $isolation = null;
	var $cable = null;
	var $discount_price = null;
	var $discount = 0;
	
	var $largeimage10 = null;
	var $largeimage11 = null;
	var $largeimage12 = null;
	var $largeimage13 = null;
	var $largeimage14 = null;
	var $largeimage15 = null;
	var $largeimage16 = null;
	var $largeimage17 = null;
	var $largeimage18 = null;
	
	function __construct(&$db){
		parent::__construct('#__w_products', 'id', $db);
	}
	
}
?>