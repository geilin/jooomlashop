<?php
/**
* @version		1.0  - 	Joomla 1.5.x
* @package		Component Com Products
* @copyright	Wampvn Group
* @license		GNU/GPL
* @website          http://wampvn.com
* @description    model warranty.
*/

defined( '_JEXEC' ) or die( 'Restricted access' );
jimport( 'joomla.application.component.model' );
JTable::addIncludePath(JPATH_ADMINISTRATOR.DS.'components'.DS.'com_products'.DS.'tables');	

class ModelProductWarranty extends JModel
{
	var $_accessory = null;
	
	function __construct()
	{
		parent::__construct();
	}

	
	function getWarranty($imei = 0, $pin = 0)
	{
			$db =& JFactory::getDBO();				
			$query = "SELECT *	FROM #__w_warranty
			WHERE imei = '$imei' AND pin = '$pin' ";
			$db->setQuery( $query);
			return $db->loadObject();		
	}
	
	function getArticle($id){
		$where = " a.id='$id'";
		$query = 'SELECT a.* ' .
					' FROM #__content AS a' .
					' WHERE '.$where;
		$this->_db->setQuery($query);
		$article = $this->_db->loadObject();
		return $article;
	} 

}

// end file
