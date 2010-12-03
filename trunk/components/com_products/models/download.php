<?php
/**
* @version		1.0  - 	Joomla 1.5.x
* @package		Component Com Products
* @copyright	Wampvn Group
* @license		GNU/GPL
* @website          http://wampvn.com
* @description    model download.
*/

defined( '_JEXEC' ) or die( 'Restricted access' );
jimport( 'joomla.application.component.model' );
JTable::addIncludePath(JPATH_ADMINISTRATOR.DS.'components'.DS.'com_products'.DS.'tables');	

class ModelProductDownload extends JModel
{
	var $_accessory = null;
	var $_info = null;
	var $_cid = null;
	var $_total = null;
	var $_scid  = null;
	
	function __construct()
	{
		parent::__construct();
		$this->_cid 	= JRequest::getInt('cid', 0);
		$this->_scid 	= JRequest::getInt('scid', 0);
		$this->_gid 	= JRequest::getVar('gid', 0);
		$this->_mid 	= JRequest::getVar('mid', 0);
		$this->_keyword = JRequest::getVar('keyword', '');
	}
	function getListDownload($limit = 10, $limitstart = 0)
	{
		if (!$this->_accessory)
		{
			$db =& JFactory::getDBO();				
			$query = "SELECT 
				d.id,
				d.name,
				d.description,
				d.download,
				d.thumbnail,
				d.downloadlink 
			FROM #__w_downloads as d
			INNER JOIN #__w_group_downloads as g
			ON d.id = g.downloadid 
			WHERE d.published = 1 ";
			if (!empty($this->_keyword)){
				$keywords = explode(' ', $this->_keyword);
				foreach ($keywords as $key){
					$query .= ' and (LOWER( d.name ) LIKE '.$db->Quote( '%'.$db->getEscaped( $key, true ).'%', false ) 
					.' or LOWER( d.description ) LIKE '.$db->Quote( '%'.$db->getEscaped( $key, true ).'%', false ) .')';				
				}
			}
			
   			if ($this->_cid > 0){
   			    if (empty($this->_scid)){
	                $cats  = $this->getSubCategory($this->_cid);
					$list = $this->_cid;
					if (!empty($cats)){
						foreach ($cats as $result){
							if (!empty($result->id)){
								$list .= ', ' .$result->id;
							}
						}
					}
				} else {
					$list =   $this->_scid .','. $this->_cid;
				}
    			$query .= ' and d.catid IN ('. $list .')';
			}


			$query .= " GROUP BY d.id ORDER BY d.id DESC";
			$db->setQuery( $query, $limitstart, $limit);
			$this->_accessory = $db->loadObjectList();
		}
		return $this->_accessory;
	}	
	
	function getCatName()
	{
			switch ($this->_cid)
			{
				case 1:
					return 'games';
				case 2:
					return 'themes';
				case 3:
					return 'wallpapers';
				case 4:
					return 'ứng dụng';
			}					
	}
	
	function getGroup($id)
	{
			$db =& JFactory::getDBO();				
			$query = "SELECT id, name 
			FROM #__w_group_downloads as d
			INNER JOIN #__w_groups as g
			ON g.id = d.groupid			
			WHERE g.published = 1 and d.downloadid = $id ";
			$db->setQuery( $query);
			return $db->loadObjectList();		
	}
	
	function getTotal()
	{
		$db =& JFactory::getDBO();
		$query = "SELECT 
				d.id
			FROM #__w_downloads as d
			INNER JOIN #__w_group_downloads as g
			ON d.id = g.downloadid 
			WHERE d.published = 1 ";
			if (!empty($this->_keyword)){
				$keywords = explode(' ', $this->_keyword);
				foreach ($keywords as $key){
					$query .= ' and (LOWER( d.name ) LIKE '.$db->Quote( '%'.$db->getEscaped( $key, true ).'%', false ) 
					.' or LOWER( d.description ) LIKE '.$db->Quote( '%'.$db->getEscaped( $key, true ).'%', false ) .')';				
				}
			}			
			if ($this->_cid > 0){
				$query .= ' and d.catid = '. $this->_cid;
			}
			// search for groupid
			if (!empty($this->_gid)){
				$query .= ' and g.groupid = '. $this->_gid;				
			}
			$query .= ' GROUP BY d.id';		
		$db->setQuery( $query );
		return count($db->loadObjectList());
	}
	
	
	function getListGroup(){
		$db =& JFactory::getDBO();
		$query = 'SELECT id, name  FROM #__w_groups WHERE published = 1 ';
		$db->setQuery($query);
		return $db->loadObjectList();		
	}
	
	function getLists()
	{
		$lists = array();	
		
		// get category
		$cats[] = array('id' => 1, 'name' => 'Games');
		$cats[] = array('id' => 2, 'name' => 'Themes');
		$cats[] = array('id' => 3, 'name' => 'Wallpapers');
		$cats[] = array('id' => 4, 'name' => 'Ứng Dụng');
			
		$lists['category'] = JHTML::_('select.genericlist',
			$cats, 'cid', 'class="text_area" '. 'onchange=subCategory(this.value);',	'id', 'name', $this->_cid );
			
  		$subCategory = $this->getSubCategory();
		array_unshift($subCategory, JHTML::_('select.option', '0', ' '.JText::_('Tất cả').' ', 'id', 'name'));
		$lists['subCategory'] = JHTML::_('select.genericlist',
			$subCategory, 'scid', 'class="text_area" '. '',	'id', 'name', $this->_scid );

		$groups = $this->getListGroup();
		array_unshift($groups, JHTML::_('select.option', '0', ' '.JText::_('Tất cả').' ', 'id', 'name'));
		$lists['group'] = JHTML::_('select.genericlist',
			$groups, 'gid', 'class="text_area" '. '',	'id', 'name', $this->_gid );			
		
		$lists['keyword'] = $this->_keyword;	
		return $lists;
	}

	function getSubCategory($cid = 0){
		if (empty($cid)){
             $cid =  $this->_cid ;
		}
		$db =& JFactory::getDBO();
		$query = 'SELECT id, name  FROM #__w_cat_downloads WHERE published = 1 and parentid = '. $cid;
		$db->setQuery($query);
		return $db->loadObjectList();
	}
	
	function ajaxSubCategory($cid)
	{
  		$subCategory = $this->getSubCategory($cid);
		array_unshift($subCategory, JHTML::_('select.option', '0', ' '.JText::_('Tất cả').' ', 'id', 'name'));
		return JHTML::_('select.genericlist',
			$subCategory, 'scid', 'class="text_area" '. '',	'id', 'name', 0 );
	}
}

// end file
