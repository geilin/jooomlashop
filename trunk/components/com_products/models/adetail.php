<?php
/**
* @version		1.0  - 	Joomla 1.5.x
* @package		Component Com Products
* @copyright	Wampvn Group
* @license		GNU/GPL
* @website          http://wampvn.com
* @description    model accessory category.
*/
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport( 'joomla.application.component.model' );
class ModelProductADetail extends JModel
{
	var $_product = null;
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
	
	function getADetail()
	{
		if(!$this->_accessory)
		{
			$query = "SELECT *
			FROM #__w_accessories
			WHERE  id = '" . $this->_id ."'";				
			$this->_db->setQuery($query);			
			$this->_accessory = $this->_db->loadObject();
			
			// update hits
			$query = "UPDATE #__w_accessories SET hits = ( hits + 1 )  WHERE id = ". (int)$this->_id;
			$this->_db->setQuery($query);
			$this->_db->query();

		}
		return $this->_accessory;
	}
	
	/*
	 * FUNTCION  getFeature 
	 * Lay thong tin tu bang #__w_features
	 * Day la thong so ky thuat cua dien thoai
	 * 
	 **/
	function getFeature() {
		if(!$this->_feature) {
			$query =  "SELECT * " 
					. " FROM #__w_features "
					. " WHERE  productid = '" . $this->_id ."'";	
			$this->_db->setQuery($query);			
			$this->_feature = $this->_db->loadObject();
				}
	
		return $this->_feature;
	}
	

	function getArticles()
	{
		if(!$this->_articles)
		{
			$query = "SELECT id, title, article 
			FROM #__w_articles WHERE  (productid = '" . $this->_id . "') and (published = '1') ORDER BY id DESC LIMIT 0,20";			
			$this->_db->setQuery($query);			
			$this->_articles = $this->_db->loadObjectList();	
		}		
		return $this->_articles;		
	}
	
	function getComment()
	{
		if(!$this->_comment)
		{
			$query = "SELECT id, name, content, date , email, rating
			FROM #__w_comments WHERE  (productid = '" . $this->_id . "') and (published = '1') ORDER BY id DESC LIMIT 0,20";			
			$this->_db->setQuery($query);			
			$this->_comment = $this->_db->loadObjectList();	
		}		
		return $this->_comment;		
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
	
	function getRating($productid){
		$db =& JFactory::getDBO();			
		$where = ' productid = '. $productid;		
		$query = "SELECT COUNT(rating) as count, SUM(rating) as total 
			FROM #__w_comments	
			WHERE published and $where	
			GROUP BY productid ";
		$db->setQuery($query);
		return $db->loadObject();
	}
	
	function insertNotes($description) {
		$db =& JFactory::getDBO();
		$query = " SELECT term, content FROM #__w_notes WHERE published = 1";
		$db->setQuery( $query );
		$rows = $db->loadObjectList();
		$des_div = "";
		
		for($k=0; $k < count( $rows ); $k++) {
			$row = $rows[$k];			
			
			$add_tips = $row->term."&nbsp;<a rel=\"tips".($k+1)."\" style=\"cursor:pointer\"><img src=\"". JURI::base()."components/com_products/images/icon-help.jpg\" align=\"texttop\" border=\"0\" /></a>";
			$des_div .= "<div id=\"tips".($k+1)."\" class=\"tipstyle\" style=\"padding-bottom: 10px;\">".$row->content."</div>";

			$description = str_replace($row->term, $add_tips, $description);			
		}
		return $description.$des_div;		
	}
	
	function removeBorder($description)
	{
		//echo $description;
		//exit;
		$pattern = '/(?<=border-style)(.*)(.*)(?=padding\: 0in 5\.4pt\;)/';
		preg_match($pattern, $string, $matches) . '<br>';
		$description = preg_replace($pattern, "", $description);
		return str_replace('border-style', 'border: 1pt solid rgb(204, 204, 204);' , $description);					
	}
	
	function getPhukienKhac($catid,$id) {
		$query = " SELECT id, name, thumbnail, price " 
					." FROM #__w_accessories "
					." WHERE published = 1"
						." AND catid ='$catid'"
						." AND id !='$id'"
					;
		$this->_db->setQuery( $query );
		$rows = $this->_db->loadObjectList();
		
		return $rows;
	}
}

// end file