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
			$query = "SELECT p.id, p.intro, p.saleprice, p.currency, p.catid, p.name, p.thumbnail, p.hits, p.monitorsize 
					FROM #__w_products as p
					
					WHERE p.published = 1 ";
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
				$query .= ' and p.catid IN ('.$list.')';
			}
			
		
			// search for size or manufacturer
			if (!empty($this->_size)){
				$query .= ' and LOWER(p.monitorsize) = '. $this->_size;				
			}
			if (!empty($this->_mid)){
				$query .= ' and p.manufacturerid = '. $this->_mid;				
			}			
			$query .= " ORDER BY p.frontpage DESC, p.id DESC ";
			
			
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
	
	function getImageDefault($proid){
            $this->_imagesDefault = null;		
			$query = "SELECT filename FROM #__w_images WHERE proid=" .(int)$proid . " AND published =1 AND isdefault =1 LIMIT 1";	
			$this->_db->setQuery($query);          
			$this->_imagesDefault->filename = $this->_db->GetOne($query);
            return $this->_imagesDefault->filename;		
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
		$query = 'SELECT count(id) FROM #__w_products WHERE published = 1';
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
	
	function getRating($productid){
	/*
		$db =& JFactory::getDBO();			
		$where = ' productid = '. $productid;		
		$query = "SELECT COUNT(rating) as count, SUM(rating) as total 
			FROM #__w_comments	
			WHERE published and $where	
			GROUP BY productid ";
		$db->setQuery($query);
		$row = $db->loadObject();

		if ($row->count){
			return round($row->total/$row->count,1);
		} else {
			return 0;
		}
		*/
	}
	
	function getChildCat($cid)
	{
			$db =& JFactory::getDBO();				
			$query = "SELECT id " 
					. " FROM #__w_categories "			
					. " WHERE published = 1 and parentid = $cid ";
			$db->setQuery( $query);
			return $db->loadObjectList();		
	}
}

// end file
