<?php
/**
* @version		1.0  - 	Joomla 1.5.x
* @package	Component Administrator Com Products
* @copyright	Wampvn Group
* @license		GNU/GPL
* @website          http://wampvn.com
* @description    model comment.
*/

defined( '_JEXEC' ) or die( 'Restricted access' );
jimport( 'joomla.application.component.model' );
JTable::addIncludePath(JPATH_ADMINISTRATOR.DS.'components'.DS.'com_products'.DS.'tables');	

class ModelProductComment extends JModel
{
	var $_comments = null;
	var $_total = null;
	var $_published = null;
	
	function __construct()
	{
		parent::__construct();
	}
	
	// comment default view
	function getComments($limitstart = 0, $limit = 20, $search = '', $pid = 0)
	{
		if (!$this->_comments)
		{
		    $where = array();
			$db =& JFactory::getDBO();		
			$search				= JString::strtolower($search);			
			// Keyword filter
			if (!empty($search)) {		
				$where[] = '(LOWER( c.name ) LIKE '.$db->Quote( '%'.$db->getEscaped( $search, true ).'%', false ) .
					' OR c.id = ' . (int) $search .	')';
			}
			if (!empty($pid)) {		
				$where[] = ' c.productid = ' . (int) $pid;
			}
			// Build the where clause of the content record query
			$where = (count($where) ? ' WHERE '.implode(' AND ', $where) : '');				
			$query = "SELECT c.*, p.name as product FROM #__w_comments as c
			INNER JOIN #__w_products as p
			ON c.productid = p.id $where 
			ORDER BY id DESC";
			$db->setQuery( $query, $limitstart, $limit);
			$this->_comments = $db->loadObjectList();
		}
		return $this->_comments;
	}	
	
	function getTotal($search = '', $pid = 0)
	{
		if (empty($this->_total))
		{
		    $where = array();
			$db =& JFactory::getDBO();	
			$search				= JString::strtolower($search);			
			// Keyword filter
			if (!empty($search)) {		
				$where[] = '(LOWER( name ) LIKE '.$db->Quote( '%'.$db->getEscaped( $search, true ).'%', false ) .
					' OR id = ' . (int) $search .	')';
			}
			if (!empty($pid)) {		
				$where[] = ' productid = ' . (int) $pid;
			}
			// Build the where clause of the content record query
			$where = (count($where) ? ' WHERE '.implode(' AND ', $where) : '');				
			$query = "SELECT count(id) FROM #__w_comments $where";
			$db->setQuery( $query );
			$this->_total = $db->loadResult();
		}
		return $this->_total;
	}

	// comment form view
	function getComment(){
		$row = JTable::getInstance('comment', 'Table');
		$cid = JRequest::getVar( 'cid', array(0), '', 'array');
		$id = $cid[0];
		$row->load($id);
		$this->_published = $row->published;	
		return $row;
	}
	
	function getLists()
	{
		$lists = array();	
		$lists['published'] = JHTML::_('select.booleanlist', 'published', 'class="inputbox"', $this->_published);		
		return $lists;
	}

	function save(){		
		$row = JTable::getInstance('comment', 'Table');
		if (!$row->bind(JRequest::get('post'))){
			echo $row->getError();
			exit();
		}
		if (!$row->store()) {
			echo $row->getError();
			exit();
		}		
	}

	function remove($cid){		
		$db =& JFactory::getDBO();
		if (count($cid)){
			$cids = implode(',', $cid);
			$query = "DELETE FROM #__w_comments WHERE id IN ( $cids ) ";
			$db->setQuery($query);
			if (!$db->query()){
				echo $db->getErrorMsg();
				exit();		
			}
		}
	}
	
	function publish($cid, $publish)
	{		
		$table =& JTable::getInstance('comment', 'Table');
		$table->publish($cid, $publish);		
	}	

}
?>