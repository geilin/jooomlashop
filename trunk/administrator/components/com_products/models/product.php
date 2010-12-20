<?php
/**
* @version		1.0  - 	Joomla 1.5.x
* @package		Component Administrator Com Products
* @copyright	Wampvn Group
* @license		GNU/GPL
* @website          http://wampvn.com
* @description    model product.
*/

defined( '_JEXEC' ) or die( 'Restricted access' );
jimport( 'joomla.application.component.model' );
JTable::addIncludePath(JPATH_ADMINISTRATOR.DS.'components'.DS.'com_products'.DS.'tables');	
class ModelProductProduct extends JModel
{
	var $_products = null;
	var $_total = null;
	var $_published = null;
	var $_path = null;
	var $_catid = null;
	var $_manufacturerid = null;
	var $_frontid = null;
	var $_currency = null;
	var $_promotion = null;	
	var $_frontpage = null;
	var $_stock = null;
	var $discount = null;
	var $_id = null;
	var $_dealerid = null;
	
	function __construct()
	{
		parent::__construct();
		$this->_path = JPATH_ROOT.DS.'images/products/';	
		
	}
	function getProducts($catid, $manufacturerid, $frontpage, $search)
	{
		global $option, $mainframe;
		
		$context			= 'com_product.products';
		$filter_order		= $mainframe->getUserStateFromRequest( $context.'filter_order',		'filter_order',		'p.name',	'cmd' );
		$filter_order_Dir	= $mainframe->getUserStateFromRequest( $context.'filter_order_Dir',	'filter_order_Dir',	'',	'word' );
		
		$where = array();
		$db =& JFactory::getDBO();		
		$search				= JString::strtolower($search);
		if ($catid > 0) {
			$where[] = 'p.catid = ' . (int) $catid;				
		}
		if ($manufacturerid > 0) {
			$where[] = 'p.manufacturerid = ' . (int) $manufacturerid;					
		}
		if ($frontpage > 0) {
			$where[] = 'p.frontpage = 1';					
		}
		// Keyword filter
		if (!empty($search)) {		
			$where[] = '(LOWER( p.name ) LIKE '.$db->Quote( '%'.$db->getEscaped( $search, true ).'%', false ) .
				' OR p.id = ' . (int) $search .	')';
		}
		// Build the where clause of the content record query
		$where = (count($where) ? ' WHERE '.implode(' AND ', $where) : '');	
		
		$orderby 	= ' ORDER BY '.$filter_order.' '. $filter_order_Dir;
		
		$limit = JRequest::getVar('limit',$mainframe->getCfg('list_limit'));
		
		$limitstart = JRequest::getVar('limitstart', 0);
		
		$query = "SELECT p.discount, p.discount_price,p.stock,p.name,p.thumbnail, p.frontpage, p.id, p.code, p.saleprice, p.intro, p.ordering, p.published, c.name as category FROM #__w_products as p
				INNER JOIN #__w_categories as c			
				ON p.catid = c.id ". $where
				. $orderby;		
		$db->setQuery( $query, $limitstart, $limit );
		$rows = $db->loadObjectList();
		if ($db->getErrorNum()) {
			echo $db->stderr();
			return false;
		}
		return $rows;
	}	

	function getPromotion($choose=''){   
    $check='';
	    $arr_promotion_image = array('','icon_hot.png','icon_new.png','icon_pro.png');
	    $str_promotion = '<table>';
	    $str_promotion .= '<tr>';
	    foreach($arr_promotion_image as $img){
	      if(!$img)
	      {
	        $str_promotion .= '<td align="center">'.JText::_('Bỏ chọn').'</td>';
	      }
	      else
	      {
	        $str_promotion .='<td align="center"><img src="'.JURI::root().'images/label/'.$img.'" /></td>';
	      }            
	    }
	    $str_promotion .= '</tr><tr>';
	    foreach($arr_promotion_image as $value){
	      if($choose === $value){
	        $check = 'checked="checked"';    
	      }  
	      else{
	        $check = '';
	      }
	      $str_promotion .='<td align="center"><input type="radio" name="promotion" class="inputbox" value="'.$value.'"'.$check.' /></td>';    
	    }
	    $str_promotion .= '</tr>';
	    $str_promotion .= '</table>';  
	    
	    return $str_promotion;
  }	
	function getCategories()
	{
		// get list of categories for dropdown filter
		$db =& JFactory::getDBO();
		$query = 'SELECT id, name  FROM #__w_categories WHERE published = 1';
		$db->setQuery($query);
		return $db->loadObjectList();		
	}

	function getManufacturer(){
		// get list of manufacturer for dropdown filter
		$db =& JFactory::getDBO();
		$query = 'SELECT id, name  FROM #__w_manufacturers WHERE published = 1 ';
		$db->setQuery($query);
		return $db->loadObjectList();		
	}
	
	function getTotal($catid, $manufacturerid, $frontpage = 0, $search)
	{
		if (empty($this->_total))
		{
			$db =& JFactory::getDBO();	
			$where = array();
			$search				= JString::strtolower($search);
			if ($catid > 0) {
				$where[] = 'catid = ' . (int) $catid;		
			}
			if ($manufacturerid > 0) {
				$where[] = 'manufacturerid = ' . (int) $manufacturerid;		
			}
			if ($frontpage > 0) {
				$where[] = 'frontpage = 1';		
			}
			// Keyword filter
			if (!empty($search)) {		
				$where[] = '(LOWER( name ) LIKE '.$db->Quote( '%'.$db->getEscaped( $search, true ).'%', false ) .
					' OR id = ' . (int) $search .	')';
			}
			// Build the where clause of the content record query
			$where = (count($where) ? ' WHERE '.implode(' AND ', $where) : '');
			
						
			$query = "SELECT count(id) FROM #__w_products $where";
			$db->setQuery( $query );
			$this->_total = $db->loadResult();
		}
		return $this->_total;
	}

  	

	
	function getProductImage($proid){
		$db = JFactory::getDBO();
		$query = 'SELECT * FROM #__w_images WHERE proid='.$proid;
		$db->setQuery($query);
		$row_img = $db->loadObjectList();
		return $row_img;
	}
	
	function getProduct(){
		$row = JTable::getInstance('product', 'Table');		
		$cid = JRequest::getVar( 'cid', array(0), '', 'array');
		$id = $cid[0];
		if ($id == 0) {
			$id = null;
		}
		$row->load($id);
//		$row2 = $this->getFeature($id);
//		$row = (object) array_merge((array) $row, (array) $row2);

		$this->_catid = $row->catid;		
		$this->_currency = $row->currency;
		$this->_manufacturerid = $row->manufacturerid;
		$this->_groupid = $row->groupid;
		$this->_promotion = $row->promotion;
		$this->_published = $row->published;	
		$this->_frontid = $row->frontid;
		$this->_frontpage = $row->frontpage;
		$this->_stock = $row->stock;
		$this->discount = $row->discount;
		$row->images = $this->getProductImage($row->id);
		return $row;
	}

	function getIDNewest(){
		$db =& JFactory::getDBO();			
		$query = "SELECT id FROM #__w_products ORDER BY id DESC LIMIT 0,1";
		$db->setQuery($query);
		return $db->loadResult();		
	}
	
	function getListDefault($catid = '', $manufacturerid = '')
	{
		$lists = array();
		
		$catgories =array();
		getTree(0,$catgories,"");
		foreach ($catgories as $result)
		{		
			if ($this->_id != $result->id){
				$cats[] = array('id' => $result->id, 'name' => $result->name_display);
			}		
		}
		array_unshift($cats, JHTML::_('select.option', '0', '- '.JText::_('Chọn danh mục').' -', 'id', 'name'));
		$lists['catid'] = JHTML::_('select.genericlist',  $cats, 'cid', 'class="inputbox" size="1" onchange="document.adminForm.submit( );"', 'id', 'name', $catid);
		
		$manufacturers = $this->getManufacturer();
		array_unshift($manufacturers, JHTML::_('select.option', '0', '- '.JText::_('Chọn nhà sản xuất').' -', 'id', 'name'));
		$lists['manufacturerid'] = JHTML::_('select.genericlist',  $manufacturers, 'mid', 'class="inputbox" size="1" onchange="document.adminForm.submit( );"', 'id', 'name', $manufacturerid);	
	
		$frontpage				= JRequest::getVar( 'frontpage', '');
		$frontpages[] = array( 'value' => '', 'text' => 'Tất cả sản phẩm');
		$frontpages[] = array( 'value' => '1', 'text' => 'Sản phẩm hot');
		$lists['frontpage'] = JHTML::_('select.genericlist',  $frontpages, 'frontpage', 'class="inputbox" size="1" onchange="document.adminForm.submit( );"', 'value', 'text', $frontpage);		
		
		return $lists;
	}
	
	function getLists()
	{
		$lists = array();	
		if (empty($this->_published)){
			$this->_published = 1;
		}
		$lists['published'] = JHTML::_('select.booleanlist', 'published', 'class="inputbox"', $this->_published);
		$lists['promotion'] = $this->getPromotion($this->_promotion);		
		$lists['frontpage'] = JHTML::_('select.booleanlist', 'frontpage', 'class="inputbox"', $this->_frontpage);
		
		$lists['lowprice'] = JHTML::_('select.booleanlist', 'discount', 'class="inputbox" onclick="showPrice(this)"', $this->discount);
		$lists['stock'] = JHTML::_('select.booleanlist', 'stock', 'class="inputbox"', $this->_stock);
		
		// get category
		$catgories =array();
		getTree(0,$catgories,"");
		
		//echo "<pre>";
		//print_r($catgories);
		//echo "</pre>";
		
	
		$cats = array();
		//getTree(0,$catgories,"");
		
		//array_unshift($cats, JHTML::_('select.option', '0', '- '.JText::_('Chọn danh mục').' -', 'value', 'text'));
		
		foreach($catgories as $item){
			if($this->hasChild($item->id)){
				$optgroup = JHTML::_('select.optgroup',$item->name_display,'value','text');
				array_push($cats,$optgroup);
				$childs = $this->getChild($item->id);
				foreach ($childs as $child) {
					array_push($cats,$child);
				}
			}
		}
		
		
		
				
		
		/*
		foreach ($catgories as $result)
		{		
			if ($this->_id != $result->id){
				$category[] = array('value' => $result->id, 'text' => $result->name_display);
			}		
		}
*/		
		$lists['category'] = JHTML::_('select.genericlist',$cats, 'catid', 'class="inputbox" '. '',	'value', 'text', $this->_catid );
			
		$manufacturers = $this->getManufacturer();
		$lists['manufacturer'] = JHTML::_('select.genericlist', $manufacturers, 'manufacturerid', 'class="inputbox" '. '',	'id', 'name', $this->_manufacturerid );
				
		$currency[] = array( 'value' => 'VNĐ', 'text' => 'VNĐ');
		$currency[] = array( 'value' => 'USD', 'text' => 'USD');
		$lists['currency'] = JHTML::_('select.genericlist',
			$currency, 'currency', 'class="inputbox" '. '',	'value', 'text', $this->_currency);
		
		return $lists;
	}
	
	
	
	
	function hasChild($catid){
		$cid = (int)$catid;
		$db =& JFactory::getDBO();
		$selects = "SELECT count(*) as total FROM #__w_categories WHERE  parentid = ".$cid."  AND published=1 "; 
		$db->setQuery( $selects);
		$row = $db->loadObject();
		if((int)$row->total > 0){
			return true;
		}else{
			return false;
		}
	}
	
	function getChild($catid){
		$db =& JFactory::getDBO();
		$selects = "SELECT id AS value,name as text FROM #__w_categories WHERE  parentid = ".(int)$catid . " AND published=1  ORDER BY ordering ASC "; 
		$db->setQuery( $selects);
		$rows = $db->loadObjectList();
		return $rows;
	}
	
	
	
	
	
	
  function setDefault($proid){
	  	$db = JFactory::getDBO();
	  	$query = "SELECT * FROM #__w_images WHERE proid=".$proid ." AND isdefault=1";
	  	$db->setQuery($query);	
	  	if(!$db->loadObject()){
	  		return 1;
	  	}
	  	return 0;
  }		

  function save(){	
		$db = & JFactory::getDBO();	
		$row = JTable::getInstance('product', 'Table');
		$post = JRequest::get('post');
		
		if (!$row->bind(JRequest::get('post'))){
			echo $row->getError();
			exit();
		}		
		
		$row->name = trim($row->name);
		$row->description = JRequest::getVar( 'description', '', 'post', 'string', JREQUEST_ALLOWRAW );
		$row->shortdesc = trim(JRequest::getVar( 'shortdesc', '', 'post', 'string', JREQUEST_ALLOWRAW ));
		$row->mediumimage = trim(JRequest::getVar( 'mediumimage', '', 'post', 'string', JREQUEST_ALLOWRAW ));

		$row->intro = trim(JRequest::getVar( 'intro', '', 'post', 'string', JREQUEST_ALLOWRAW ));
		//$row->video = trim(JRequest::getVar( 'video', '', 'post', 'string', JREQUEST_ALLOWRAW ));		
		if (empty($row->date)) {
			$row->date  	= date('Y-m-d');
		}
		$row->currency  = 'VNĐ';
		// upload image
		$thumbnail = JRequest::getVar('thumbnail', null, 'files', 'array');
		$row->thumbnail =  JRequest::getVar('old_thumbnail');		
		if (!empty($thumbnail['tmp_name'])) {				
			if (!empty($row->thumbnail)){
				@unlink($this->_path .$row->thumbnail);			
			}
			$row->thumbnail = uploadImage($thumbnail, $this->_path);	
		}
//		$mediumimage = JRequest::getVar('mediumimage', null, 'files', 'array');
//		$row->mediumimage =  JRequest::getVar('old_mediumimage');		
//		if (!empty($mediumimage['tmp_name'])) {				
//			if (!empty($row->mediumimage)){
//				unlink($this->_path .$row->mediumimage);			
//			}
//			$row->mediumimage = uploadImage($mediumimage, $this->_path);	
//		}

		for ($i = 1; $i < 1; $i++) {
			${largeimage.$i} = JRequest::getVar('largeimage'.$i, null, 'files', 'array');
			$row->{largeimage.$i} =  JRequest::getVar('old_largeimage'.$i);		
			if (!empty(${largeimage.$i}['tmp_name'])) {				
				if (!empty($row->{largeimage.$i})){
					@unlink($this->_path .$row->{largeimage.$i});	
					@unlink($this->_path . 'thumbnail/'.$row->{largeimage.$i});
				}
				$row->{largeimage.$i} = uploadImage(${largeimage.$i}, $this->_path);	
				// create thumbnail
				$thumb = new easyphpthumbnail;
				$thumb -> Thumbheight = 60;
				// Create the thumbnail and output to file
				$thumb -> Thumblocation = $this->_path . 'thumbnail/';
				$thumb -> Thumbprefix = '';
				$thumb -> Createthumb($this->_path . $row->{largeimage.$i},'file');
			}
		}

		if (!$row->store()) {
			echo $row->getError();			
		}else{
			$sqlUBP = "";
			// build the others property
	    	$intProperty 		=& JTable::getInstance( 'property', 'Table' );
	    	$arrprop = $intProperty->int_property();
	    			    
	    	$arr_post = JRequest::get('post');
	      	$query = 'SELECT * FROM #__w_property ORDER BY ordering'
	    	;
	    	$db->setQuery( $query );
	    	$rowsProperty = $db->loadObjectList();
	    	if ($db->getErrorNum()) JError::raiseError(500, $db->stderr() );
	    	
	    	foreach($rowsProperty as $rowprp){
	        $field_name = $arrprop["field_name"] . $rowprp->id;
//			var_dump($field_name,isset($post[$field_name]));exit;
	        if(isset($post[$field_name])){
	        	if($rowprp->datatype =='Plan Text'){
	          		$field_value = htmlspecialchars($post[$field_name], ENT_QUOTES);
	        	}elseif($rowprp->datatype =='HTML'){
	        		$field_value = trim(JRequest::getVar( $field_name, '', 'post', 'string', JREQUEST_ALLOWRAW ));
	        	}
	          $sqlUBP .= $sqlUBP?", `$field_name`='$field_value'":"`$field_name`='$field_value'";
	        }
	      }
	      if($sqlUBP){
	        $sqlUBP = "UPDATE #__w_products SET $sqlUBP WHERE id=".$row->id;
	        $db->setQuery( $sqlUBP );
	    		if (!$db->query()) {
	    			JError::raiseError( 500, $db->stderr() );
	    		  return false;
	    		}
	      }		
	      // save upload img	
			if(isset($post['filename'])){
				foreach ($post['filename'] as $filename){
					$row_img = JTable::getInstance('images', 'Table');
					$row_img->filename = $filename;
					$row_img->proid = $row->id;
					$row_img->isdefault = $this->setDefault($row->id);
					if (!$row_img->store()){
						echo $row->getError();
						exit();
					}		
				}

			}

		}	
//		$this->saveFeature($row->id);
		$this->updateCode($row->id);
		return $row->id;	
	}

	function updateCode($id)
	{
		$db =& JFactory::getDBO();
		$code = 'BB'. $id;			
		if (!empty($id)){
			$query = "UPDATE #__w_products SET code = '$code' WHERE id = $id ";
				$db->setQuery($query);
				if (!$db->query()){
					echo $db->getErrorMsg();		
					exit();	
				}
			}
		return true;		
	}

	function remove($cid){		
		$db =& JFactory::getDBO();
		if (count($cid)){
			foreach ($cid as $id) {
				// remove image			
				$this->removeAllImage($id);
				// remove all comment
				$this->removeAllComment($id);
				// remove all order
				//$this->removeAllOrder($id);
				// remove product in datebase
				$query = "DELETE FROM #__w_products WHERE id = $id ";
				$db->setQuery($query);
				
				if (!$db->query()){
					echo $db->getErrorMsg();
					exit();	
				}
			}
		}
	}	

	function removeProductImage($cid, $type){		
		$db =& JFactory::getDBO();			
		if (!empty($cid)){
			$query = "SELECT large{$type} FROM #__w_products WHERE id = $cid";
			$db->setQuery($query);
			$db->query();
			$image = $db->loadResult();
			if (!empty($image)){
				@unlink($this->_path .$image);
				@unlink($this->_path .'thumbnail/thumb_'.$image);
			}
			$query = "UPDATE #__w_products SET large{$type} = '' WHERE id = $cid ";
				$db->setQuery($query);
				if (!$db->query()){
					echo $db->getErrorMsg();		
					exit();	
				}
			}
	}
	
	function removeAllImage($cid){
		jimport('joomla.filesystem.file');
		$db =& JFactory::getDBO();			
		if (!empty($cid)){
			$query = "SELECT thumbnail, mediumimage, largeimage1, 
			largeimage2, largeimage3, largeimage4, largeimage5, largeimage6, largeimage7, 
			largeimage8, largeimage9, largeimage10, largeimage11, largeimage12, largeimage13, 
			largeimage14, largeimage15, largeimage16, largeimage17 
			FROM #__w_products WHERE id = $cid";
			$db->setQuery($query);
			$db->query();
			$row = $db->loadObject();
			if (!empty($row->thumbnail) and file_exists($this->_path .$row->thumbnail)){
				@unlink($this->_path .$row->thumbnail);			
			}
			if (!empty($row->mediumimage) and file_exists($this->_path .$row->mediumimage)){
				@unlink($this->_path .$row->mediumimage);			
			}
			for ($i = 1; $i < 18; $i++) {
				if (!empty($row->{largeimage.$i}) and file_exists($this->_path .$row->{largeimage.$i})){
					@unlink($this->_path .$row->{largeimage.$i});
					@unlink($this->_path .'thumbnail/thumb_'.$row->{largeimage.$i});
				}
			}
			
			
			$query1 = "SELECT *	FROM #__w_images WHERE proid = $cid";
			$db->setQuery($query1);
			$rows = $db->loadObjectList();
			
			
			
			if(count($rows) >0){
				foreach ($rows as $item){
					if (!empty($item->filename) and file_exists($this->_path .$item->filename)){
						//@unlink($this->_path .$item->filename);
						//@unlink($this->_path .'thumbs/'.$item->filename);
						JFile::delete($this->_path .$item->filename);
						JFile::delete($this->_path .'thumbs/'.$item->filename);
					}
				}
				$del = "DELETE FROM #__w_images WHERE proid = ".(int)$cid ;
				$db->setQuery($del);
				$db->query();
			}
			
			
			
		}
	}
	
	function removeAllComment($cid){
		$db =& JFactory::getDBO();			
		if (!empty($cid)){
			$query = "DELETE FROM #__w_comments WHERE productid = $cid ";
			$db->setQuery($query);
			if (!$db->query()){
				echo $db->getErrorMsg();		
				exit();	
			}
		}
	}
	
	function removeAllOrder($cid){
		$db =& JFactory::getDBO();			
		if (!empty($cid)){
			$query = "DELETE FROM #__w_orders WHERE productid = $cid ";
			$db->setQuery($query);
			if (!$db->query()){
				echo $db->getErrorMsg();
				exit();			
			}
		}
	}
	
	function publish($cid, $publish)
	{		
		$table =& JTable::getInstance('product', 'Table');
		$table->publish($cid, $publish);		
	}
	
	function frontpage($cid, $frontpage)
	{		
		$db =& JFactory::getDBO();		
		if (!empty($cid)){
			foreach ($cid as $id) {
			$query = "UPDATE #__w_products SET frontpage = $frontpage WHERE id = $id ";
				$db->setQuery($query);
				if (!$db->query()){
					echo $db->getErrorMsg();		
					exit();	
				}
			}
		}
		return 'Đã thay đổi trạng thái sản phẩm hot';		
	}
	
	function discount($cid, $frontpage)
	{		
		$db =& JFactory::getDBO();	
		if (!empty($cid)){
			foreach ($cid as $id) {
			$query = "UPDATE #__w_products SET discount = $frontpage WHERE id = $id ";
				$db->setQuery($query);
				if (!$db->query()){
					echo $db->getErrorMsg();		
					exit();	
				}
			}
		}
		return 'Đã thay đổi trạng thái khuyến mãi';		
	}
function hasproducts($cid, $frontpage)
	{		
		$db =& JFactory::getDBO();		
		if (!empty($cid)){
			foreach ($cid as $id) {
			$query = "UPDATE #__w_products SET stock = $frontpage WHERE id = $id ";
				$db->setQuery($query);
				if (!$db->query()){
					echo $db->getErrorMsg();		
					exit();	
				}
			}
		}
		return 'Đã thay đổi trạng thái sản phẩm trong kho';		
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
			$row = & JTable::getInstance('product', 'Table');

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
		
	
	function insertYN($string) {		
		// replace
		$imageYes = '<img src="'. JURI::root().'templates/wp_hangdientu/images/yes.gif" />';			
		$string = str_replace('YYY', $imageYes, $string);			
		$imageNo = '<img src="'. JURI::root().'templates/wp_hangdientu/images/no.gif" />';			
		$string = str_replace('NNN', $imageNo, $string);
		return $string;
	}
	
}
?>