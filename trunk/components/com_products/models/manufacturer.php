<?php

defined( '_JEXEC' ) or die( 'Restricted access' );
jimport( 'joomla.application.component.model' );

class ModelProductManufacturer extends JModel
{
	var $_product_m 	= null;
	var $_info 			= null;
	var $_cid 			= null;
	var $_total 		= null;
	var $_imagesDefault =null;
	
	function __construct()
	{
		parent::__construct();

		$this->_cid = JRequest::getInt('catid', 0);
		$this->_size = JRequest::getVar('size', '');
		$this->_mid = JRequest::getVar('mid', '');
		
	}
	function getListProduct($limit, $limitstart = 0)	{
		
		if (!$this->_product_m){
			$db =& JFactory::getDBO();				
			$query = 'SELECT p.id, p.saleprice, p.currency, p.catid, p.name, i.filename' 
					.' FROM #__w_products AS p'
					.' LEFT JOIN #__w_images AS i ON p.image = i.id'				
					.' WHERE p.published = 1';
		
			if ($this->_mid > 0){
				$query .= ' AND p.manufacturerid = '. $this->_mid;				
			}			
			$query .= " ORDER BY p.frontpage DESC, p.id DESC ";
			$db->setQuery( $query, $limitstart, $limit);
			$this->_product_m = $db->loadObjectList();
		}
		return $this->_product_m;
	}	
	
	
	
	function getManufactureName()
	{
		$db =& JFactory::getDBO();				
		$query = 'SELECT name  FROM #__w_manufacturers'			
				.' WHERE published = 1';
		if ($this->_mid > 0){
			$query .= ' AND id = ' . $this->_mid;
		}			
		$query .= ' LIMIT 1';			
		$db->setQuery( $query);
		return $db->loadResult();		
	}
	
	
	function getTotal()
	{
		$db =& JFactory::getDBO();
		$query = 'SELECT COUNT(id) FROM #__w_products WHERE published = 1';			
		if ($this->_mid > 0){
			$query .= ' AND manufacturerid = '. $this->_mid;				
		}	
		$db->setQuery( $query );
		return $db->loadResult();
	}
	
	function getCategory($cid)
	{
		if (!empty($catid))
		{
			$db =& JFactory::getDBO();
			$query = "SELECT * FROM #__w_categories WHERE id = $cid";
			$db->setQuery( $query );
			$result = $db->loadObject();
			return $result->name;		
		}
	}
	
}
// end file
