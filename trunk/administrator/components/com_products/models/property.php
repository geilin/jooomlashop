<?php
/**
* @version		1.0  - 	Joomla 1.5.x
* @package	Component Administrator Com Products
* @copyright	Wampvn Group
* @license		GNU/GPL
* @website          http://wampvn.com
* @description    model property.
*/

defined( '_JEXEC' ) or die( 'Restricted access' );
jimport( 'joomla.application.component.model' );
JTable::addIncludePath(JPATH_ADMINISTRATOR.DS.'components'.DS.'com_products'.DS.'tables');	

class ModelProductProperty extends JModel
{
	var $_properties = null;
	var $_total = null;
	var $_published = null;
	
	function __construct()
	{
		parent::__construct();
	}
	function getProperties()
	{
		$db = & JFactory::getDBO();		
		if (!$this->_properties)
		{
			// get the total number of records
			$where = array( );
			$query = 'SELECT * FROM #__w_property AS prp'
			. (count( $where ) ? "\n WHERE " . implode( ' AND ', $where ) : '' )
			;
			$db->setQuery( $query );
			$this->_properties = $db->loadObjectList();
		}
		return $this->_properties;
	}	
	
	function getTotal()
	{
		$db = & JFactory::getDBO();	
		if (empty($this->_total))
		{
			$where = array( );			
			$db =& JFactory::getDBO();				
			$query = 'SELECT COUNT(*)'
			. ' FROM #__w_property'
			. (count( $where ) ? "\n WHERE " . implode( ' AND ', $where ) : '' );
			$this->_total = $db->loadResult();
		}
		return $this->_total;
	}

	function getProperty(){
		$row = JTable::getInstance('property', 'Table');
		$cid = JRequest::getVar( 'cid', array(0), '', 'array');
		$id = $cid[0];
		$row->load($id);
		$this->_published = $row->published;	
		return $row;
	}
	
	function getLists()
	{
		$lists = array();	
		if (!isset($this->_published)){
			$this->_published = 1;
		}
		$lists['published'] = JHTML::_('select.booleanlist', 'published', 'class="inputbox"', $this->_published);		
		return $lists;
	}

	function save(){
	  global $mainframe;
	  
	  $error_flag = false;
	  
	  // Check for request forgeries
		JRequest::checkToken() or jexit( 'Invalid Token' );
	
		$db 		=& JFactory::getDBO();
		$task 		= JRequest::getVar( 'task');
	
		$row 		=& JTable::getInstance( 'property', 'Table' );
		if (!$row->bind(JRequest::get('post'))) {
			JError::raiseError(500, $row->getError() );
		}
		
		// pre-save checks
		if (!$row->check()) {
		  $error_flag = true;
			JError::raiseWarning('SOME_ERROR_CODE', $row->getError());
		}
		
		if(!$error_flag){
	    // if new item, order last in appropriate group
	  	$flag = false;
	  	if (!$row->id) {
	  	  $flag = true;
	  		$row->ordering = $row->getNextOrder( );
	  	}
	  	
	    // save the changes
	  	if (!$row->store()) {
	  		JError::raiseError(500, $row->getError() );
	  	}else{
	  		
	  	  $info_property = $row->int_property();
	      //  update table business
	      if ($flag){
	        $field_name = $info_property["field_name"].$row->id;
	        $sqlUB = "ALTER TABLE `#__w_products` ADD `$field_name` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NULL";
	        $db->setQuery( $sqlUB );
	        if (!$db->query()) {
	      		JError::raiseError(500, $db->getErrorMsg() );
	      	}
	      }
	  
	    }
	  	
	  	$msg = JText::_( 'Property saved' );
	  }
		
		$link = 'index.php?option=com_products&controller=property';
		$mainframe->redirect( $link, $msg );	
	}

	function remove($cid){		
		global $mainframe;
	
		// Check for request forgeries
//		JRequest::checkToken() or jexit( 'Invalid Token' );
	
		$db =& JFactory::getDBO();
		if (count( $cid ) < 1) {
			JError::raiseError(500, JText::_( 'Select a property to delete', true ) );
		}
	
		JArrayHelper::toInteger( $cid );
		$cids = implode( ',', $cid );
	
		$query = 'SELECT id, label as title FROM #__w_property WHERE id IN ( '.$cids.' )';
		$db->setQuery( $query );
		if (!($rows = $db->loadObjectList())) {
			JError::raiseError( 500, $db->stderr() );
			return false;
		}
	
		$name = array();
		$err = array();
		$cid = array();
		foreach ($rows as $row) {
			$cid[]	= (int) $row->id;
			$name[]	= $row->title;
		}
	
		if (count( $cid )){
			
	    $cids = implode( ',', $cid );
			$query = 'DELETE FROM #__w_property'
			. ' WHERE id IN ( '.$cids.' )'
			;
			$db->setQuery( $query );
			if (!$db->query()) {
				JError::raiseError( 500, $db->stderr() );
			  return false;
			}
			
		$field_name = "DROP `prp_" . implode( '`, DROP `prp_', $cid ) . "`";
	    $sqlUB = "ALTER TABLE `#__w_products` $field_name";
	    $db->setQuery( $sqlUB );
	    if (!$db->query()) {
	  		JError::raiseError(500, $db->getErrorMsg() );
	  		return false;
	  	}
		}
	
		if (count( $err )){
			$cids = implode( ', ', $err );
			JError::raiseWarning('SOME_ERROR_CODE', JText::sprintf( 'DESCCANNOTBEREMOVEDPROPERTY', $cids ));
		}
	
		$names = implode( ', ', $name );
		$msg = JText::sprintf( 'Properties %s successfully deleted', $names );
		$mainframe->redirect( 'index.php?option=com_products&controller=property', $msg );
	}


	
	function publish($cid, $publish)
	{		
		$table =& JTable::getInstance('property', 'Table');
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
			$row = & JTable::getInstance('property', 'Table');

			// Update the ordering for items in the cid array
			for ($i = 0; $i < $total; $i ++)
			{
				$row->load( (int) $cid[$i] );
				if ($row->ordering != $order[$i]) {
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