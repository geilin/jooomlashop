<?php
/**
* @version		1.0  - 	Joomla 1.5.x
* @package	Component Com Products
* @copyright	Wampvn Group
* @license		GNU/GPL
* @website          http://wampvn.com
* @description    model category.
*/
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport( 'joomla.application.component.model' );
class ModelProductDetail extends JModel
{
	var $_product = null;
	var $_id = null;
	var $_catid = null;	
	var $_accessory= null;
	var $_dealer = null;
	var $_manufacturer = null;
	var $_feature = null;
	var $_comment = null;
	var $_articles = null;
	var $_properties = null;
	var $_images = null;
	var $_imagesDefault = null;
	
	function __construct()
	{
		parent::__construct();
		$this->_id = JRequest::getInt('id', 0);
	}
	
	function getDetail()
	{
		if(!$this->_product)
		{
			$query = "SELECT p.*, c.name as category, f.name AS manufacture "
					 . " FROM #__w_products as p 
								LEFT JOIN #__w_manufacturers AS f ON p.manufacturerid = f.id "
							  . "INNER JOIN #__w_categories as c ON p.catid = c.id "
					 . " WHERE  p.id = '" . $this->_id ."'";				
			$this->_db->setQuery($query);			
			$this->_product = $this->_db->loadObject();

			if(!$this->_product){
				$msg = 'Không tìm thấy sản phẩm';
				$controller = new JController;
				$controller->setRedirect('index.php',$msg);
				$controller->redirect();
			}

			
			$this->_manufacturer = $this->_product->manufacturerid;
			$this->_catid = $this->_product->catid;
			
			// update hits
			$query = "UPDATE #__w_products SET hits = ( hits + 1 )  WHERE id = ". (int)$this->_id;
			$this->_db->setQuery($query);
			$this->_db->query();


		}
		
		return $this->_product;
	}
	
	
	function getRelative(){
		$relative = array();
		if($this->_product){
			$query = "SELECT p.name,p.id,p.catid,p.saleprice,p.currency "
					 . " FROM #__w_products as p  "
					 . " WHERE p.published =1 AND p.stock=1 AND p.id <> '".$this->_product->id."' AND  p.catid = '" .$this->_product->catid ."' ORDER BY date DESC LIMIT 0,6 ";				
			$this->_db->setQuery($query);			
			$relative = $this->_db->loadObjectList();
			for ($i =0; $i <count($relative); $i++){
				$relative[$i]->filename = $this->getImageDefaultRelative($relative[$i]->id);
			}
			
		}
		return $relative;
	}
	
	
	
	function getImages(){
		if(!$this->_images){
			$query = "SELECT filename FROM #__w_images WHERE proid=" .(int)$this->_id . " AND published =1 ";
			$this->_db->setQuery($query);			
			$this->_images = $this->_db->loadObjectList();
		}
		return $this->_images;
	}
	
	function getImageDefault(){
		
		if(!$this->_imagesDefault){
			$query = "SELECT filename FROM #__w_images WHERE proid=" .(int)$this->_id . " AND published =1 AND isdefault =1";
			$this->_db->setQuery($query);			
			$this->_imagesDefault = $this->_db->loadObject();
		}
		return $this->_imagesDefault;
	}
	function getImageDefaultRelative($id){
		$imagesDefault = '';

			$query = "SELECT filename FROM #__w_images WHERE proid=" .(int)$id . " AND published =1 AND isdefault =1";
			$this->_db->setQuery($query);			
			$imagesDefault = $this->_db->loadObject();

		return $imagesDefault->filename;
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
			//$query = "SELECT id, title, article 
			//FROM #__w_articles WHERE  (productid = '" . $this->_id . "') and (published = '1') ORDER BY id DESC LIMIT 0,20";	

			$query = "SELECT * FROM #__content WHERE 
			(LOWER(title) LIKE " .$this->_db->Quote( '%'.$this->_db->getEscaped( $this->_product->name, true ).'%' ) . "  
			 or LOWER(metakey) LIKE " .$this->_db->Quote( '%'.$this->_db->getEscaped( $this->_product->name, true ).'%', false ) . ") 
			 and (state = '1') ORDER BY id DESC ";
		
			$this->_db->setQuery($query);			
			$this->_articles = $this->_db->loadObjectList();	
			
			//echo "<pre>";
			//print_r($this->_articles);
			//echo "</pre>";
		
		}		
		return $this->_articles;		
	}
	
	function getComment()
	{
		if(!$this->_comment)
		{
			$query = "SELECT id, name, comment_title,content, date , email, rating
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
	
	function getPhukien() {
		if(!$this->_product || !$this->_accessory )
		{
			$query =  "SELECT ac_tb.id,ac_tb.name,ac_tb.thumbnail, ac_tb.price "
					  . " FROM #__w_accessories AS ac_tb, #__w_group_accessories AS gac_tb "
					  . " WHERE ac_tb.published = 1 "
					  			. " AND ac_tb.id =  gac_tb.accessorid"
					  			. " AND gac_tb.groupid ='".$this->_product->groupid."'"
					  . " GROUP BY ac_tb.id"
					  . " ORDER BY ac_tb.id DESC "
					  ;		
			$this->_db->setQuery($query);
			$this->_accessory = $this->_db->loadObjectList();
		}
		return $this->_accessory;
	}
	
	
	function getProperties(){
		$property = array();
		$queryPro =  "SELECT * FROM #__w_property WHERE published=1 ORDER BY ordering";
		$this->_db->setQuery($queryPro);
		//$property = $this->_db->loadObjectList();
		
		$i=0;
		foreach($property as $pro){
			$field = 'prp_'.$pro->id;
			if($this->_product->$field !=''){
				$this->_properties[$i]['label'] = $pro->label;
				$this->_properties[$i]['value'] = $this->_product->$field;
				$i++;
			}
			
		}
		return $this->_properties;
	}
	
	
	
	function getDealer() {
		if(!$this->_product || !$this->_dealer )
		{
			$query =  "SELECT image"
					  . " FROM #__w_dealers "
					  . " WHERE id = '".$this->_product->dealerid."'"
					  ;		
			$this->_db->setQuery($query);
			$this->_dealer = $this->_db->loadResult();
		}
		return $this->_dealer;
	}
	/*
	 * GET DOWNLOAD ITEMS FOR THIS PHONE 
	 */
	function getDownloads($catid = 0 ,$groupid = 0,$limit = 6, $limitstart = 0) {
		
		$query =  "SELECT 
						d.id,
						d.name,
						d.description,
						d.download,
						d.thumbnail,
						d.downloadlink 
				   FROM #__w_downloads as d
						INNER JOIN #__w_group_downloads as g
						ON d.id = g.downloadid 
				   WHERE d.published = 1 "
							." AND d.catid = '".$catid."' AND g.groupid='$groupid'" 
				;
		$this->_db->setQuery($query,$limitstart,$limit);
		return $this->_db->loadObjectList();	
	}
	function getcountDownloads($catid = 0 ,$groupid = 0) {
		$query =  "SELECT 
						count(d.id)
						
				   FROM #__w_downloads as d
						INNER JOIN #__w_group_downloads as g
						ON d.id = g.downloadid 
				   WHERE d.published = 1 "
							." AND d.catid = '".$catid."' AND g.groupid='$groupid'" 
				;
		$this->_db->setQuery($query);
		return $this->_db->loadResult();	
	}
	
	function getGroup($id)
	{
			$db =& JFactory::getDBO();				
			$query = "SELECT id, name 
			FROM #__w_group_downloads as d
			INNER JOIN #__w_groups as g
			ON g.id = d.groupid			
			WHERE g.published = 1 and d.downloadid = $id ";
			$db->setQuery( $query);
			return $db->loadObjectList();		
	}
}
?>