<?php
/**
* @version		1.0  - 	Joomla 1.5.x
* @package	Component Com Products
* @copyright	Wampvn Group
* @license		GNU/GPL
* @website          http://wampvn.com
* @description    model cart.
*/

defined( '_JEXEC' ) or die( 'Restricted access' );
jimport( 'joomla.application.component.model' );
JTable::addIncludePath(JPATH_ADMINISTRATOR.DS.'components'.DS.'com_products'.DS.'tables');	

class ModelProductCart extends JModel
{
	var $_info = null;
	
	function __construct()
	{
		parent::__construct();
		session_start();		
	}
	
	function addCart($productid)
	{		
		$info = $this->getInfo($productid);	
		$Cart = new Shopping_Cart('shopping_cart');		
		$Cart->setItem($productid, $info);		
		$Cart->save();
	}	
	
	function insertCart($productid,$quantity)
	{		
		$info = $this->getInfo($productid);	
		$Cart = new Shopping_Cart('shopping_cart');		
		$Cart->setItemSon($productid, $info,$quantity);	
		//print_r($Cart);
		$Cart->save();
	}	
	
	
	function updateCart()
	{
		$Cart = new Shopping_Cart('shopping_cart');

		if ( !empty($_GET['id']) && !empty($_GET['quantity']) ) {
			$quantity = $Cart->getItemQuantity($_GET['id'])+$_GET['quantity'];
			$Cart->setItemQuantity($_GET['id'], $quantity);
		}
		if ( !empty($_GET['quantity']) ) {
			foreach ( $_GET['quantity'] as $id=>$quantity ) {
				$Cart->setItemQuantity($id, $quantity);
			}
		}
		if ( !empty($_GET['remove']) ) {
			foreach ( $_GET['remove'] as $order_code ) {
				$Cart->setItemQuantity($order_code, 0);
			}
		}
		$Cart->save();
	}

	function getInfo($productid)
	{
		if (!$this->_info)
		{
			$db =& JFactory::getDBO();				
			$query = "SELECT id, name, thumbnail, saleprice, currency FROM #__w_products
				WHERE published = 1 and id = ".$productid;
			$db->setQuery( $query);
			$this->_info = $db->loadObject();
		}
		return $this->_info;	
	}
	
	function getImageDefault($proid){
		$db			=& JFactory::getDBO();	
		$query = "SELECT filename FROM #__w_images WHERE proid=" .(int)$proid . " AND published =1 AND isdefault =1";
		
		$db->setQuery($query);			
		$imgDefault = $db->loadObject();
		
		
		//var_dump($imgDefault);
		
		return $imgDefault->filename;
	}
	
	
}

// end file
