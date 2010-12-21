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

class ModelProductCategory extends JModel
{
	var $_product = null;
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
		
		if (!$this->_product)
		{
			$db =& JFactory::getDBO();				
			$query = 'SELECT p.id, p.saleprice, p.currency, p.catid, p.name , i.filename' 
					.' FROM #__w_products AS p'
					.' LEFT JOIN #__w_images AS i ON p.image = i.id'
					.' WHERE p.published = 1';
			if ($this->_cid > 0){
				$cats  = $this->getChildCat($this->_cid);
				$list = $this->_cid;
				if (!empty($cats)){
					foreach ($cats as $result){
						if (!empty($result->id)){
							$list .= ', ' .$result->id;
						}
					}
				}
				$query .= ' AND p.catid IN ('.$list.')';
			}	
		
			// search for manufacturer
			if ($this->_mid > 0){
				$query .= ' AND p.manufacturerid = '. $this->_mid;				
			}			
			$query .= ' ORDER BY p.ordering ASC, p.frontpage DESC, p.id DESC';
			
			
			$db->setQuery( $query, $limitstart, $limit);
			$this->_product = $db->loadObjectList();
		}	
		return $this->_product;
	}	
	
	function getInfo()
	{
		if (!$this->_info)
		{
			$db =& JFactory::getDBO();				
			$query = "SELECT p.id, p.catid, p.monitorsize, m.name as manufacturer, m.id as manufacturerid 
			FROM #__w_products as p
			INNER JOIN #__w_manufacturers as m 
			ON p.manufacturerid = m.id 	
			
			
			WHERE p.published = 1 ";
			if ($this->_cid > 0){
				$query .= ' and p.catid = '.$this->_cid;
			}

			$db->setQuery( $query);
			$this->_info = $db->loadObjectList();			
			
		}
		return $this->_info;	
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
	
	
	
	function getManufacturerName($mid)
	{
			$db =& JFactory::getDBO();				
			$query = "SELECT name 
			FROM #__w_manufacturers			
			WHERE published = 1 ";
			if ($mid > 0){
				$query .= ' and id = '.$mid;
			}
			$query .= ' ORDER BY ordering ';
			$db->setQuery( $query);
			return $db->loadResult();		
	}

		
	function getTotal()
	{
		$db =& JFactory::getDBO();
		$query = 'SELECT COUNT(id) FROM #__w_products WHERE published = 1';
			if (!empty($this->_cid)){
				if ($this->_cid > 0){
					$cats  = $this->getChildCat($this->_cid);
					$list = $this->_cid;
					if (!empty($cats)){
						foreach ($cats as $result){
							if (!empty($result->id)){
								$list .= ', ' .$result->id;
							}
						}
					}
					$query .= ' and catid IN ('.$list.')';
				}
			}
			if (!empty($this->_size)){
				$query .= ' and LOWER(monitorsize) = '. $this->_size;				
			}
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
	
	function getChildCat($cid)
	{
			$db =& JFactory::getDBO();				
			$query = 'SELECT id FROM #__w_categories'			
					. ' WHERE published = 1 and parentid = ' . $cid;
			$db->setQuery( $query);
			return $db->loadObjectList();		
	}
}
// end file
