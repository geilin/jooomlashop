<?php
/**
* @version		1.0  - 	Joomla 1.5.x
* @package	Component Administrator Com Products
* @copyright	Wampvn Group
* @license		GNU/GPL
* @website          http://wampvn.com
* @description    model order.
*/

defined( '_JEXEC' ) or die( 'Restricted access' );
jimport( 'joomla.application.component.model' );
JTable::addIncludePath(JPATH_ADMINISTRATOR.DS.'components'.DS.'com_products'.DS.'tables');	

class ModelProductOrder extends JModel
{
	var $_orders = null;
	var $_total = null;
	var $_published = null;
	
	function __construct()
	{
		parent::__construct();
	}
	
	// comment default view
	function getOrder()
	{
		$row = JTable::getInstance('order', 'Table');		
		$cid = JRequest::getVar( 'cid', array(0), '', 'array');
		$id = $cid[0];
		if ($id == 0) {
			$id = null;
		}
		$row->load($id);
		return $row;
	}	
	
	// comment default view
	function getOrders($limitstart = 0, $limit = 20, $search = '')
	{
		global $mainframe;
		$where = array();
		$context			= 'com_product.orders';
		$filter_order		= $mainframe->getUserStateFromRequest( $context.'filter_order',		'filter_order',		'id',	'cmd' );
		$filter_order_Dir	= $mainframe->getUserStateFromRequest( $context.'filter_order_Dir',	'filter_order_Dir',	'',	'word' );
		
		$post = JRequest::get('post');

		if (!$this->_orders)
		{	
			$db =& JFactory::getDBO();		
			$search				= JString::strtolower($search);			
			// Keyword filter
			if (!empty($search)) {		
				$where[] = '(LOWER( name ) LIKE '.$db->Quote( '%'.$db->getEscaped( $search, true ).'%', false ) .
					' OR id = ' . (int) $search .	')';
			}

			//build date for filter
			if($post && (isset($post['from']) | isset($post['to']))){
		 		if(@$post['from']!=='' && @$post['to']!==''){
		 			$where[] = ' date BETWEEN "'.@$post['from'].'" AND "'. @$post['to'].'"';
			 	}elseif($post['from']!==''){
			 		$where[] = ' date >= "'.@$post['from'].'"';
			 	}elseif($post['to']!==''){
			 		$where[] = ' date <= "'.@$post['to'].'"';
			 	}			
			}
			
			// Build the where clause of the content record query
			$where = (count($where) ? ' WHERE '.implode(' AND ', $where) : '');	
			$orderby 	= ' ORDER BY '.$filter_order.' '. $filter_order_Dir;			
			$query = "SELECT * FROM #__w_orders $where"   
			. $orderby;

			$db->setQuery( $query, $limitstart, $limit);
			$this->_orders = $db->loadObjectList();
		}
				
		return $this->_orders;
	}	
		
	
	function getTotal($search = '')
	{
		$where = array();
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
			$query = "SELECT count(id) FROM #__w_orders $where";
			$db->setQuery( $query );
			$this->_total = $db->loadResult();
		}
		return $this->_total;
	}

	
	function save(){		
		$row = JTable::getInstance('order', 'Table');
		$cid = JRequest::getVar( 'cid', array(0), '', 'array');
		$post = JRequest::get('post');
		$row->load($cid[0]);
		
		if (!$row->bind(JRequest::get('post'))){
			echo $row->getError();
			exit();
		}
//		$row->status = $post['status'] 		
	//	var_dump('here',$row,$cid);exit;
		if (!$row->store()) {
			echo $row->getError();
			exit();
		}		
	}

	function remove($cid){		
		$db =& JFactory::getDBO();
		if (count($cid)){
			$cids = implode(',', $cid);
			$query = "DELETE FROM #__w_orders WHERE id IN ( $cids ) ";
			$db->setQuery($query);
			if (!$db->query()){
				echo $row->getError();
				exit();		
			}
		}
	}
	
	function publish($cid, $publish)
	{		
		$table =& JTable::getInstance('order', 'Table');
		$table->publish($cid, $publish);		
	}	

}
?>