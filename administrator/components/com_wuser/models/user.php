<?php
/**
* @version		1.0  - 	Joomla 1.5.x
* @package	Component Administrator Com User
* @copyright	Wampvn Group
* @license		GNU/GPL
* @website          http://wampvn.com
* @description    model user.
*/

defined( '_JEXEC' ) or die( 'Restricted access' );
jimport( 'joomla.application.component.model' );
JTable::addIncludePath(JPATH_ADMINISTRATOR.DS.'components'.DS.'com_wuser'.DS.'tables');	

class ModelWUserUser extends JModel
{
	var $_sex = null;
	var $_total = null;
	
	function __construct()
	{
		parent::__construct();
		$this->_path = JPATH_ROOT.DS.'upload/product/';	
	}
	function getUsers($search)
	{
		global $option, $mainframe;
		$db =& JFactory::getDBO();		
		$search				= JString::strtolower($search);
		
		// Keyword filter
		if (!empty($search)) {		
			$where[] = '(LOWER( u.name ) LIKE '.$db->Quote( '%'.$db->getEscaped( $search, true ).'%', false ) .
				' OR w.id = ' . (int) $search .	')';
		}
		// Build the where clause of the content record query
		$where = (count($where) ? ' WHERE '.implode(' AND ', $where) : '');	
		
		$limit = JRequest::getVar('limit',$mainframe->getCfg('list_limit'));
		$limitstart = JRequest::getVar('limitstart', 0);
		
		$query = "SELECT w.*, u.name FROM #__w_users as w
				INNER JOIN #__users as u			
				ON w.userid = u.id ". $where
				. ' ORDER BY w.id DESC';
		$db->setQuery( $query, $limitstart, $limit );
		$rows = $db->loadObjectList();
		if ($db->getErrorNum()) {
			echo $db->stderr();
			return false;
		}
		
		return $rows;
	}	
	

	function getTotal($search)
	{
		if (empty($this->_total))
		{
			$db =& JFactory::getDBO();	
			$search				= JString::strtolower($search);
			// Keyword filter
			if (!empty($search)) {		
				$where[] = '(LOWER( name ) LIKE '.$db->Quote( '%'.$db->getEscaped( $search, true ).'%', false ) .
					' OR id = ' . (int) $search .	')';
			}
			// Build the where clause of the content record query
			$where = (count($where) ? ' WHERE '.implode(' AND ', $where) : '');			
						
			$query = "SELECT count(id) FROM #__w_users $where";
			$db->setQuery( $query );
			$this->_total = $db->loadResult();
		}
		return $this->_total;
	}

	function getUser(){
		$row = JTable::getInstance('user', 'Table');
		$cid = JRequest::getVar( 'cid', array(0), '', 'array');
		$id = $cid[0];
		$row->load($id);
		$this->_sex = $row->sex;
		return $row;
	}
	
	function getLists()
	{
		$lists = array();	
		$lists['published'] = JHTML::_('select.booleanlist', 'published', 'class="inputbox"', $this->_published);		

		$sex[] = array( 'value' => '0', 'text' => 'female');
		$sex[] = array( 'value' => '1', 'text' => 'male');
		$lists['sex'] = JHTML::_('select.genericlist',
			$sex, 'sex', 'class="inputbox" '. '',	'value', 'text', $this->_sex);		
		return $lists;
	}

	function saveUser(){		
		$row = JTable::getInstance('user', 'Table');
		if (!$row->bind(JRequest::get('post'))){
			echo "<script> alert('". $row->getError() ."');
				window.history.go(-1); \n";
			exit();
		}
		
		if (!$row->store()) {
			echo "<script> alert('".$row->getError()."');
			window.history.go(-1);
			</script>\n";
			exit();
		}		
	}
	


	function removeUser($cid){		
		$db =& JFactory::getDBO();
		if (count($cid)){
			foreach ($cid as $id) {				
				$query = "DELETE FROM #__w_users WHERE id = $id ";
				$db->setQuery($query);
				
				if (!$db->query()){
					echo "<script> alert('". $db->getErrorMsg() ."');
					window.history.go(-1); \n </script>";			
				}
			}
		}
	}	
}
?>