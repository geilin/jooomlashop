<?php
/**
* @version		1.0  - 	Joomla 1.5.x
* @package		Component Com Products
* @copyright	Wampvn Group
* @license		GNU/GPL
* @website          http://wampvn.com
* @description    model download category.
*/
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport( 'joomla.application.component.model' );
class ModelProductDDetail extends JModel
{
	var $_download = null;
	var $_id = null;
	var $_catid = null;
	
	var $_manufacturer = null;
	var $_feature = null;
	var $_comment = null;
	var $_articles = null;
	
	function __construct()
	{
		parent::__construct();
		$this->_id = JRequest::getInt('id', 0);
	}
	
	function getDDetail()
	{
		if(!$this->_download)
		{
			$query = "SELECT *
			FROM #__w_downloads as d
				INNER JOIN #__w_group_downloads as g
				ON d.id = g.downloadid 
			WHERE  d.id = '" . $this->_id ."'";				
			$this->_db->setQuery($query);			
			$this->_download = $this->_db->loadObject();
			$this->_catid = $this->_download->catid;
			
			// update hits
			$query = "UPDATE #__w_downloads SET hits = ( hits + 1 )  WHERE id = ". (int)$this->_id;
			$this->_db->setQuery($query);
			$this->_db->query();

		}
		return $this->_download;
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
	function formatNumber($strNumber)
	{
		$inttemp1 = '';
		$inttemp2 = '';
		$intstop = floor((strlen($strNumber)-1)/3);
		$inttemp1 = $strNumber;	
		for( $i=0; $i< $intstop; $i++)
		{	
			$inttemp2 = '.' . substr($inttemp1, strlen($inttemp1) - 3) . $inttemp2;
			$inttemp1 = substr($inttemp1,0,strlen($inttemp1) - 3);		
		}	
		return $inttemp1 . $inttemp2;
	}
	
	function download()
	{
		$id = JRequest::getInt('id', '');	
		// update hits
		$query = "UPDATE #__w_downloads SET download = ( download + 1 )  WHERE id = ". (int)$this->_id;
		$this->_db->setQuery($query);
		$this->_db->query();
		
		$query = "SELECT downloadlink
		FROM #__w_downloads
		WHERE  id = '" . $this->_id ."'";				
		$this->_db->setQuery($query);			
		$link = $this->_db->loadResult();
		$tmp = explode('/', $link);
		$nameFile =  $tmp[count($tmp) - 1];
		ob_clean();		
 
		header("Content-type: charset=UTF-8"); 
		header('Content-Disposition: attachment; filename="'.$nameFile.'"'); 
		header("Content-Transfer-Encoding: binary");
		header("Pragma: no-cache"); 
		header("Expires: 0");
		header('Content-length: ' . filesize($link));    //khai bao dung luong tai xuong

		ob_flush();
		exit();

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
			$cats, 'cid', 'class="text_area" '. 'onchange=subCategory(this.value);',	'id', 'name', $this->_catid );
			
   		$subCategory = $this->getSubCategory();
		array_unshift($subCategory, JHTML::_('select.option', '0', ' '.JText::_('Tất cả').' ', 'id', 'name'));
		$lists['subCategory'] = JHTML::_('select.genericlist',
			$subCategory, 'scid', 'class="text_area" '. '',	'id', 'name', 1 );
			
		$groups = $this->getListGroup();
		array_unshift($groups, JHTML::_('select.option', '0', ' '.JText::_('Tất cả').' ', 'id', 'name'));
		$lists['group'] = JHTML::_('select.genericlist',
			$groups, 'gid', 'class="text_area" '. '',	'id', 'name', $this->_gid );			
		return $lists;
	}
	
	function getSubCategory(){
		$db =& JFactory::getDBO();
		$query = 'SELECT id, name  FROM #__w_cat_downloads WHERE published = 1 and parentid = '. $this->_catid;
		$db->setQuery($query);
		return $db->loadObjectList();
	}

}

// end file