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

class ModelProductCompare extends JModel
{
	var $_product = null;
	var $_total   = null;
	var $_where   = null;
	
	function __construct()
	{
		parent::__construct();
		
	}
	function getListProduct($limit = 10, $limitstart = 0)
	{
		
			$this->_where = $this->buildWhere();
			$db =& JFactory::getDBO();				
			$query = "SELECT p.id, p.catid, p.name, p.thumbnail "
				   . " FROM #__w_products as p "
			       . " WHERE p.published = 1 "
			       ;
			if ($this->_where) {
				$query .=  'AND '. $this->_where;	
			}
			$query .= " ORDER BY p.id DESC";
			
			$db->setQuery( $query, $limitstart, $limit);
			$this->_product = $db->loadObjectList();
		
		return $this->_product;
	}
	/*
	 * Build WHERE FOR LIST PHONE FILTER
	 */	
	function buildWhere() {
			$manul   = JRequest::getVar('manul','');
			$proline = JRequest::getVar('proline','');
			if ($manul || $proline) {
				$where = array();
				if ($manul) {
					$cats  = $this->getChildCat($manul);
					$list  = $manul;
					if (!empty($cats)){
					foreach ($cats as $result){
						if (!empty($result->id)){
							$list .= ', ' .$result->id;
						}
					}
				}
				$where[] = ' p.catid IN ('.$list.')';
				}
				if ($proline) {
					$where[] = " p.groupid='".$proline."' ";
				}
				$where = implode('AND',$where);
				
			} else {
				$where = null;
			}
			return $where;
	}	
	function getTotal()
	{
		$db =& JFactory::getDBO();
		$query = "SELECT count(p.id) "
				   . " FROM #__w_products as p "
			       . " WHERE p.published = 1 "
				  ;	
		if ($this->_where) {
				$query .=  'AND '. $this->_where;	
		}
		$db->setQuery( $query );
		return $db->loadResult();
	}
	
		
	/*
	 * GET MANUFACTURE
	 */
	function getManufacture() {
		$query = "SELECT id, name "
				   . " FROM #__w_categories "
			       . " WHERE published = 1 AND parentid=0 "
				  ;	
		$this->_db->setQuery( $query );
		return $this->_db->loadObjectList();
	}
	
	/*
	 * GET PHONE GROUP
	 */
	function getGroup() {
		$query = "SELECT id, name "
				   . " FROM #__w_groups "
			       . " WHERE published = 1 "
				  ;	
		$this->_db->setQuery( $query );
		return $this->_db->loadObjectList();
	}
	
	/*
	 * GET PHONE COMPARE FOR 4 LI
	 */
	function getPhoneCompareList($phonecompare) {
		$phonecompare = implode(",", $phonecompare);
		$query = "SELECT p.id, p.catid, p.name, p.thumbnail "
				   . " FROM #__w_products as p "
			       . " WHERE p.published = 1 "
			       	 . " AND  p.id IN (".$phonecompare.")"
			       ;
		$this->_db->setQuery( $query );
		return $this->_db->loadObjectList();
	}
	
	/*
	 * GET INFO PHONES
	 */
	function getInfoPhones($phonecompare) {
		$idArray = implode(',',$phonecompare);
		$query = "SELECT p.*, f.* "
				   . " FROM #__w_products as p, #__w_features as f "
			       . " WHERE p.id = f.productid AND p.published = 1 "
			       	     . " AND  p.id IN (".$idArray.")"
			       ;
		$this->_db->setQuery( $query );
		return $this->_db->loadObjectList();
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
