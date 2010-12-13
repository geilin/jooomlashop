<?php
/**
* @version		1.0  - 	Joomla 1.5.x
* @package	Component Com Products
* @copyright	Wampvn Group
* @license		GNU/GPL
* @website          http://wampvn.com
* @description    model category.
*/

defined( '_JEXEC' ) or die( 'Restricted access' );
jimport( 'joomla.application.component.model' );
JTable::addIncludePath(JPATH_ADMINISTRATOR.DS.'components'.DS.'com_products'.DS.'tables');	

class ModelProductManufacturer extends JModel
{
	var $_product_m = null;
	var $_info = null;
	var $_cid = null;
	var $_total = null;
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
			$query = "SELECT p.id, p.intro, p.saleprice, p.currency, p.catid, p.name, p.thumbnail, p.hits, p.monitorsize, m.name as manufacture  
					FROM #__w_products as p
					LEFT JOIN #__w_manufacturers as m ON m.id=p.manufacturerid 
					WHERE p.published = 1 ";
		
			if (!empty($this->_mid)){
				$query .= ' and p.manufacturerid = '. $this->_mid;				
			}			
			$query .= " ORDER BY p.frontpage DESC, p.id DESC ";
			$db->setQuery( $query, $limitstart, $limit);
			$this->_product_m = $db->loadObjectList();
		}
		return $this->_product_m;
	}	
	
	
	function getImageDefault($proid){
		$this->_imagesDefault = '';
		if(!$this->_imagesDefault){
			$query = "SELECT filename FROM #__w_images WHERE proid=" .(int)$proid . " AND published =1 AND isdefault =1";
	
			$this->_db->setQuery($query);			
			$this->_imagesDefault = $this->_db->loadObject();
		}
		return $this->_imagesDefault;
	}
	
	
	
	
	function getCatName()
	{
			$db =& JFactory::getDBO();				
			$query = "SELECT name 
			FROM #__w_categories			
			WHERE published = 1 ";
			if ($this->_cid > 0){
				$query .= ' and id = '.$this->_cid;
			}
			$db->setQuery( $query);
			return $db->loadResult();		
	}
	
	
	function getTotal()
	{
		$db =& JFactory::getDBO();
		$query = 'SELECT count(id) FROM #__w_products WHERE published = 1';
			
			if (!empty($this->_mid)){
				$query .= ' and manufacturerid = '. $this->_mid;				
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
