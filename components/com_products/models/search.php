<?php
/**
* @version		1.0  - 	Joomla 1.5.x
* @package	Component Com Products
* @copyright	Wampvn Group
* @license		GNU/GPL
* @website          http://wampvn.com
* @description    model search.
*/

defined( '_JEXEC' ) or die( 'Restricted access' );
jimport( 'joomla.application.component.model' );
JTable::addIncludePath(JPATH_ADMINISTRATOR.DS.'components'.DS.'com_products'.DS.'tables');	

class ModelProductSearch extends JModel
{
	var $_product = null;
	var $_cid = null;
	var $_total = null;
	
	function __construct()
	{
		parent::__construct();
		$this->_cid = JRequest::getInt('catid', 0);
		$this->_size = JRequest::getVar('size', '');
		$this->_mid = JRequest::getVar('mid', '');
		print_r($this->_keyword);		
		$this->_type = JRequest::getVar('type', '');
	}
	function getListProduct($keyword, $limit = 10, $limitstart = 0)
	{
		if (!$this->_product)
		{
			$db =& JFactory::getDBO();				
			$query = "SELECT p.id, p.intro, p.saleprice, p.currency, p.catid, p.name, p.thumbnail, p.hits 
			FROM #__w_products as p
			WHERE p.published = 1 ";			
			
			if (!empty($keyword)){
				$keywords = explode(' ', $keyword);
				foreach ($keywords as $key){
					$query .= ' and (LOWER( p.name ) LIKE '.$db->Quote( '%'.$db->getEscaped( $key, true ).'%', false ) 
					.' or LOWER( p.intro ) LIKE '.$db->Quote( '%'.$db->getEscaped( $key, true ).'%', false ) .')';				
				}
			}	

			$query .= " ORDER BY p.id DESC";
			$db->setQuery( $query, $limitstart, $limit);
			$this->_product = $db->loadObjectList();
		}
		return $this->_product;
	}	
	
	function getListAccessory($keyword, $limit = 10, $limitstart = 0)
	{
		if (!$this->_accessory)
		{
			$db =& JFactory::getDBO();				
			$query = "SELECT a.id, a.shortdesc, a.price, a.name, a.thumbnail, a.hits 
			FROM #__w_accessories as a
			WHERE a.published = 1 ";
			
			if (!empty($keyword)){
				$keywords = explode(' ', $keyword);
				foreach ($keywords as $key){
					$query .= ' and (LOWER( a.name ) LIKE '.$db->Quote( '%'.$db->getEscaped( $key, true ).'%', false ) 
					.' or LOWER( a.shortdesc ) LIKE '.$db->Quote( '%'.$db->getEscaped( $key, true ).'%', false ) .')';				
				}
			}			

			$query .= " ORDER BY a.id DESC";
			$db->setQuery( $query, $limitstart, $limit);
			$this->_accessory = $db->loadObjectList();
		}
		return $this->_accessory;
	}
	
	function getListNews($keyword, $limit = 10, $limitstart = 0)
	{
			$db =& JFactory::getDBO();				
			$query = "SELECT c.id, c.title, c.introtext, c.alias, c.sectionid , 
			cc.alias as category, cc.id as categorid
			FROM #__content as c
			INNER JOIN #__categories AS cc ON cc.id = c.catid 
			WHERE c.state = 1 ";			
			if (!empty($keyword)){
				$keywords = explode(' ', $keyword);
				foreach ($keywords as $key){
					$query .= ' and (LOWER( c.title ) LIKE '.$db->Quote( '%'.$db->getEscaped( $key, true ).'%', false ) 
					.' or LOWER( c.introtext ) LIKE '.$db->Quote( '%'.$db->getEscaped( $key, true ).'%', false ) .')';				
				}
			}	
			$query .= " ORDER BY c.id DESC";
			$db->setQuery( $query, $limitstart, $limit);
			return $db->loadObjectList();			
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
	
	function getTotal($keyword)
	{
		$db =& JFactory::getDBO();
		$query = 'SELECT count(id) FROM #__w_products WHERE published = 1';
			if (!empty($keyword)){
				$keywords = explode(' ', $keyword);
				foreach ($keywords as $key){			
					$query .= ' and (LOWER( name ) LIKE '.$db->Quote( '%'.$db->getEscaped( $key, true ).'%', false ) 
					.' or LOWER( intro ) LIKE '.$db->Quote( '%'.$db->getEscaped( $key, true ).'%', false ) .')';				
				}
			}
		$db->setQuery( $query );
		return $db->loadResult();
	}
	
	function getTotalAccessory($keyword)
	{
		$db =& JFactory::getDBO();
		$query = 'SELECT count(id) FROM #__w_accessories WHERE published = 1';
			if (!empty($keyword)){
				$keywords = explode(' ', $keyword);
				foreach ($keywords as $key){			
					$query .= ' and (LOWER( name ) LIKE '.$db->Quote( '%'.$db->getEscaped( $key, true ).'%', false ) 
					.' or LOWER( shortdesc ) LIKE '.$db->Quote( '%'.$db->getEscaped( $key, true ).'%', false ) .')';				
				}
			}
		$db->setQuery( $query );
		return $db->loadResult();
	}
	
	function getTotalNews($keyword)
	{
		$db =& JFactory::getDBO();
		$query = 'SELECT count(id) FROM #__content WHERE sectionid > 0';
			if (!empty($keyword)){
				$keywords = explode(' ', $keyword);
				foreach ($keywords as $key){			
					$query .= ' and (LOWER( title ) LIKE '.$db->Quote( '%'.$db->getEscaped( $key, true ).'%', false ) 
					.' or LOWER( introtext ) LIKE '.$db->Quote( '%'.$db->getEscaped( $key, true ).'%', false ) .')';				
				}
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
	}

	public function highlight($text, $keyword)
    {
		$beforeMatch = '<span style="background-color:#81ADF4">';
		$afterMatch = '</span>';  
		$output = '';

        $words = array();

        preg_match_all('#(?:"([^"]+)"|(?:[^\s\+\-"\(\)><~\*\'\|\\`\!@\#\$%^&_=\[\]\{\}:;,\./\?]+))#si', $keyword, $matches, PREG_SET_ORDER);

        foreach ($matches as $match)
        {
            if (2 === count($match)) {
                $words[] = $match[1];
            } else {
                $words[] = $match[0];
            }
        }

        $words = implode('|', $words);
        $textParts = preg_split('#(<script[^>]*>.*?</script>|<style[^>]*>.*?</style>|<.+?>)#si', $text, -1, PREG_SPLIT_DELIM_CAPTURE);
        foreach ($textParts as $byHtmlPart)
        {
            if (!empty($byHtmlPart) && $byHtmlPart{0} != '<') {
                $byHtmlPart = preg_replace('#(' . $words . ')#si', $beforeMatch . '\1' . $afterMatch, $byHtmlPart);
            }
            $output .= $byHtmlPart;
        }
        return $output;
    }
}

// end file
