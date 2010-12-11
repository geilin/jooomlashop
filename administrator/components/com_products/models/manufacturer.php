<?php
/**
* @version		1.0  - 	Joomla 1.5.x
* @package	Component Administrator Com Products
* @copyright	Wampvn Group
* @license		GNU/GPL
* @website          http://wampvn.com
* @description    model manufacturer.
*/

defined( '_JEXEC' ) or die( 'Restricted access' );
jimport( 'joomla.application.component.model' );
JTable::addIncludePath(JPATH_ADMINISTRATOR.DS.'components'.DS.'com_products'.DS.'tables');	

class ModelProductManufacturer extends JModel
{
	var $_manufacturers = null;
	var $_total = null;
	var $_published = null;
	var $_path = null;
	
	function __construct()
	{
		parent::__construct();
		$this->_path = JPATH_ROOT.DS.'images/manufacturer/';
	}
	function getManufacturers()	{
	
		global $mainframe,$option;
		$order = '';
		$filter_order		= $mainframe->getUserStateFromRequest( $option.'filter_order',		'filter_order',		'',	'cmd' );
		$filter_order_Dir	= $mainframe->getUserStateFromRequest( $option.'filter_order_Dir',	'filter_order_Dir',	'',	'word' );
		
		
		if ($filter_order == 'ordering') {
			$order = ' ORDER BY ordering '. $filter_order_Dir;
		} elseif($filter_order == 'name') {
			$order = ' ORDER BY name ' .$filter_order_Dir ;
		}else{
			$order = ' ORDER BY id DESC' ;
		}
		
	
		if (!$this->_manufacturers)	{
			$db =& JFactory::getDBO();				
			$query = "SELECT * FROM #__w_manufacturers $order";
			
			$db->setQuery( $query);
			$this->_manufacturers = $db->loadObjectList();
		}
		return $this->_manufacturers;
	}	
	
	function getTotal()
	{
		if (empty($this->_total))
		{
			$db =& JFactory::getDBO();				
			$query = "SELECT count(*) FROM #__w_manufacturers ";
			$db->setQuery( $query );
			$this->_total = $db->loadResult();
		}
		return $this->_total;
	}

	function getManufacturer(){
		$row = JTable::getInstance('manufacturer', 'Table');
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
		$row = JTable::getInstance('manufacturer', 'Table');
		if (!$row->bind(JRequest::get('post'))){
			echo $row->getError();				
			exit();
		}
		$row->name = trim($row->name);
		$row->description = JRequest::getVar( 'description', '', 'post', 'string', JREQUEST_ALLOWRAW );
		
		// upload image
		$file = JRequest::getVar('image', null, 'files', 'array');
		$row->image =  JRequest::getVar('old_image');
		if (!empty($file['tmp_name'])) {				
			if (!empty($row->image)){
				unlink($this->_path .$row->image);			
			}
			$row->image = uploadImage($file, $this->_path);	
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
			$query = "SELECT count(id) FROM #__w_products WHERE manufacturerid IN ( $cids )";
			$db->setQuery( $query );
			if ($db->loadResult() > 0){
				echo $row->getError();
				exit();
			} else {
				foreach ($cid as $id) {
					$this->removeManufacturerImage($id);
					$query = "DELETE FROM #__w_manufacturers WHERE id = $id ";
					$db->setQuery($query);
					if (!$db->query()){
						echo $row->getError();
						exit();		
					}
				}
			}
		}
	}

	function removeManufacturerImage($cid){		
		$db =& JFactory::getDBO();		
		if (!empty($cid)){
			$query = "SELECT image FROM #__w_manufacturers WHERE id = $cid";
			$db->setQuery($query);
			$db->query();
			$image = $db->loadResult();
			if (!empty($image)){
				unlink($this->_path .$image);			
			}
			$query = "UPDATE #__w_manufacturers SET image = '' WHERE id = $cid ";
				$db->setQuery($query);
				if (!$db->query()){
					echo $row->getError();
					exit;		
				}
			}
	}
	
	function publish($cid, $publish)
	{		
		$table =& JTable::getInstance('manufacturer', 'Table');
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
			$row = & JTable::getInstance('manufacturer', 'Table');

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