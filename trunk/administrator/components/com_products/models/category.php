<?php
/**
* @version		1.0  - 	Joomla 1.5.x
* @package		Component Administrator Com Products
* @copyright	Wampvn Group
* @license		GNU/GPL
* @website          http://wampvn.com
* @description    model category.
*/

defined( '_JEXEC' ) or die( 'Restricted access' );
jimport( 'joomla.application.component.model' );
JTable::addIncludePath(JPATH_ADMINISTRATOR.DS.'components'.DS.'com_products'.DS.'tables');
include_once( JPATH_COMPONENT.DS.'helpers'.DS.'functions.php' );
class ModelProductCategory extends JModel
{
	var $_categories = null;
	var $_total = null;
	var $_published = null;
	
	function __construct()
	{
		parent::__construct();
	}
	function getCategories()
	{
		if (!$this->_categories)
		{
//			$db =& JFactory::getDBO();				
//			$query = "SELECT * FROM #__w_categories";
//			$db->setQuery( $query);
//			$this->_categories = $db->loadObjectList();
			
			$catgories =array();
			getTree(0,$catgories,"");
			return $this->_categories = $catgories;
		}
		return $this->_categories;
	}	
	
	function getTotal()
	{
		if (empty($this->_total))
		{
			$db =& JFactory::getDBO();				
			$query = "SELECT count(*) FROM #__w_categories ";
			$db->setQuery( $query );
			$this->_total = $db->loadResult();
		}
		return $this->_total;
	}

	function getCategory(){
		$row = JTable::getInstance('category', 'Table');
		$cid = JRequest::getVar( 'cid', array(0), '', 'array');
		$this->_id = $cid[0];
		$row->load($this->_id);
		$this->_published = $row->published;
		$this->_parentid = $row->parentid;	
		return $row;
	}
	
	function getLists()
	{
		$lists = array();	
		if (!isset($this->_published)){
			$this->_published = 1;
		}
		$lists['published'] = JHTML::_('select.booleanlist', 'published', 'class="inputbox"', $this->_published);

		// get category
		$catgories =array();
		getTree(0,$catgories,"");
		foreach ($catgories as $result)
		{		
			if ($this->_id != $result->id){
				$category[] = array('value' => $result->id, 'text' => $result->name_display);
			}		
		}	
		array_unshift($category, array('value' => 0, 'text' => '&nbsp;0.Root'));			
		$lists['category'] = JHTML::_('select.genericlist',
			$category, 'parentid', 'class="inputbox" '. '',	'value', 'text', $this->_parentid );
			
		return $lists;
	}

	function save(){		
		$row = JTable::getInstance('category', 'Table');
		$post = JRequest::get('post');
		$post['ordering'] = 1;
		
		if (!$row->bind($post)){
			JError::raiseError( 500, $row->getErrorMsg() );
			return false;
		}
		$row->name = trim($row->name);
		if (!$row->store()) {
			JError::raiseError( 500, $row->getErrorMsg() );
			return false;
		}		
	}

	function remove($cid){		
		$db =& JFactory::getDBO();
		if (count($cid)){
			$cids = implode(',', $cid);
			$query = "SELECT count(id) FROM #__w_products WHERE catid IN ( $cids )";
			$db->setQuery( $query );
			if ($db->loadResult() > 0){
					JError::raiseError( 500, 'Category này còn chứa sản phẩm' );
					return false;
			} else {
				$query = "DELETE FROM #__w_categories WHERE id IN ( $cids ) ";
				$db->setQuery($query);
				if (!$db->query()){
					JError::raiseError( 500, $db->getErrorMsg() );
					return false;		
				}
			}
		}
	}
	
	function publish($cid, $publish)
	{		
		$table =& JTable::getInstance('category', 'Table');
		$table->publish($cid, $publish);		
	}
	
	function saveOrder($cid)
		{
			// Initialize variables
			$db			= & JFactory::getDBO();

			$cid		= JRequest::getVar( 'cid', array(0), 'post', 'array' );
			$order		= JRequest::getVar( 'order', array (0), 'post', 'array' );
			$redirect	= JRequest::getVar( 'redirect', 0, 'post', 'int' );
			$rettask	= JRequest::getVar( 'returntask', '', 'post', 'cmd' );
			$total		= count($cid);

			$conditions	= array ();

			JArrayHelper::toInteger($cid, array(0));
			JArrayHelper::toInteger($order, array(0));

			// Instantiate an article table object
			$row = & JTable::getInstance('category', 'Table');

			// Update the ordering for items in the cid array
			for ($i = 0; $i < $total; $i ++)
			{
				$row->load( (int) $cid[$i] );
				if ($row->ordering != $order[$i] && (int)$order[$i] >0) {
					$row->ordering = $order[$i];
					if (!$row->store()) {
						JError::raiseError( 500, $db->getErrorMsg() );
						return false;
					}

				}
			}
		}
		
}
?>