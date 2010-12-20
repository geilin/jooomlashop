<?php
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport( 'joomla.application.component.model' );
class ModelProductDetail extends JModel
{
	var $_product 	= null;
	var $_id 		= null;
	var $_catid 	= null;
	var $_manufacturer = null;	
	var $_images 	= null;
	var $_relative 	= null;
	
	function __construct()
	{
		parent::__construct();
		$this->_id = JRequest::getInt('id', 0);
	}
	
	function getDetail()
	{
		if(!$this->_product)
		{
			$query = 'SELECT p.*, i.filename, c.name AS category, f.name AS manufacture'
					 .' FROM #__w_products AS p'
					 .' LEFT JOIN #__w_images AS i ON p.image = i.id'
					 .' LEFT JOIN #__w_manufacturers AS f ON p.manufacturerid = f.id'
					 .' INNER JOIN #__w_categories as c ON p.catid = c.id'
					 .' WHERE  p.id = ' . $this->_id . ' LIMIT 1';				
			$this->_db->setQuery($query);			
			$this->_product = $this->_db->loadObject();

			if(!$this->_product){
				$msg = 'Không tìm thấy sản phẩm';
				$mainframe =& JFactory::getApplication();
				$mainframe->redirect('index.php', $msg, 'notice'); //'error' or 'notice'
			}
			
			$this->_manufacturer = $this->_product->manufacturerid;
			$this->_catid = $this->_product->catid;
			
			// update hits
			$query = 'UPDATE #__w_products SET hits = ( hits + 1 )  WHERE id = '. $this->_id;
			$this->_db->setQuery($query);
			$this->_db->query();
		}		
		return $this->_product;
	}
	
	
	function getRelative(){
		if(!$this->_relative){
			$query = 'SELECT p.name, p.id,p.catid, p.saleprice, p.currency, i.filename'
					 .' FROM #__w_products AS p'
					 .' LEFT JOIN #__w_images AS i ON p.image = i.id'
					 .' WHERE p.published =1 AND p.stock=1 AND p.id <> '.$this->_product->id
							.' AND  p.catid = ' .$this->_product->catid
					 .' ORDER BY p.date DESC LIMIT 0, 6';				
			$this->_db->setQuery($query);			
			$this->_relative = $this->_db->loadObjectList();			
		}
		return $this->_relative;
	}	
	
	function getImages(){
		if(!$this->_images){
			$query = 'SELECT filename FROM #__w_images'
					.' WHERE proid=' . $this->_id . ' AND published =1';
			$this->_db->setQuery($query);			
			$this->_images = $this->_db->loadObjectList();
		}
		return $this->_images;
	}
}
?>