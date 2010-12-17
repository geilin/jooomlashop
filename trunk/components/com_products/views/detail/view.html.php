<?php
/**
* @version		1.0  - 	Joomla 1.5.x
* @package	Component Com Products
* @copyright	Wampvn Group
* @license		GNU/GPL
* @website          http://wampvn.com
* @description    view detail.
*/
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport('joomla.application.component.view');
jimport('joomla.html.pagination');

class ProductViewDetail extends JView
{
	function display($tpl = null)
	{
		global $option, $mainframe, $layout;
		
		// get model
		$model = &$this->getModel();
		$product = $model->getDetail();
		$profeature = $model->getFeature();
		
		$titleCatName = JFilterOutput::stringURLSafe($product->category);
		$titleCatName = str_replace(' ', '-', strtolower(trim($titleCatName)));
		
		$product->link = JRoute::_('index.php?option=' . $option .
			'&view=detail&id=' . $product->id);	
		
			
		if (!empty($product->description)) {
			$product->description = $model->removeBorder($product->description);
			$product->description = $model->insertNotes($product->description);
		}
        
		$document =& JFactory::getDocument();     

		$document->addScript('components/com_products/js/jquery-1.3.2.js');
		$document->addScript('components/com_products/js/colorbox/jquery.colorbox.js');
		$document->addStyleSheet('components/com_products/js/colorbox/colorbox.css');        
		$document->addScriptDeclaration('if($===jQuery){jQuery.noConflict();} jQuery(document).ready(function(){ jQuery("a[rel=\'product_image\']").colorbox(); });');

		$titleSEO = '';		
		if (!empty($product->name)) {
			$titleSEO = $product->name;
			if (!empty($product->category)){
			$titleSEO = $product->name . ' | '.$product->category;
			}
		}
        
        $document->setTitle($titleSEO . ' | '. $mainframe->getCfg('sitename'));  
				
		
		$properties = $model->getProperties();
		$images 	= $model->getImages();
		$imgDefault = $model->getImageDefault();
		
		$relative 	= $model->getRelative();
		
			
		$app =& JFactory::getApplication();
		$pathway = $app->getPathway();    
		$pathway->addItem($product->name);		
		
		// Assign REF
		$this->assignRef('relative', $relative);
		$this->assignRef('imgDefault', $imgDefault);
		$this->assignRef('images', $images);
		$this->assignRef('properties', $properties);
		
		$this->assignRef('profeature', $profeature);
		$this->assignRef('product', $product);
		
		$this->assignRef('titleCatName', $titleCatName);
		
		$this->assignRef('token', $this->creatToken());
		parent::display($tpl);
	}
	
	function loadAppDownload($model,$groupid,$limit = 6, $limitstart = 0) {
		$download = array();	
		$total    = array();
		$totals[0] 	   = $model->getcountDownloads(1,$groupid); // 1
		$totals[1] 	   = $model->getcountDownloads(2,$groupid); // 2
		$totals[2] 	   = $model->getcountDownloads(3,$groupid); // 3
		$totals[3] 	   = $model->getcountDownloads(4,$groupid); // 4
		
		if ($totals[0]>0) {
			$total = $totals[0];
			$download['html']['type'] = '1';
			$download['html']['value'] = $this->htmlListApp($model->getDownloads(1,$groupid,$limit, $limitstart));
			// tao phan trang ( function ) va return
			$download['paging'] = $this->htmlPaging($total, $limit, $limitstart);
			$download['total']  = $totals;
 			return $download;
		} 
		
		
		if ($totals[1]>0) {
			$total = $totals[1];
			$download['html']['type'] = '2';
			$download['html']['value']   = $this->htmlListApp($model->getDownloads(2,$groupid,$limit, $limitstart));
			// tao phan trang ( function ) va return
			$download['paging'] = $this->htmlPaging($total, $limit, $limitstart);
			$download['total']  = $totals;
			return $download;
		}
		
		
		if ($totals[2]>0) {
			$total = $totals[2];
			$download['html']['type'] = '3';
			$download['html']['value']  = $this->htmlListApp($model->getDownloads(3,$groupid,$limit, $limitstart));
			// tao phan trang ( function ) va return
			$download['paging'] = $this->htmlPaging($total, $limit , $limitstart);
			$download['total']  = $totals;
			return $download;
		}
		
		
		if ($totals[3]>0) {
			$total = $totals[3];
			$download['html']['type'] = '4';
			$download['html']['value']  = $this->htmlListApp($model->getDownloads(4,$groupid,$limit, $limitstart));
			// tao phan trang ( function ) va return
			$download['paging'] = $this->htmlPaging($total, $limit, $limitstart);
			$download['total']  = $totals;
			return $download;
		}

	}
	
	function htmlListApp($obj) {
		$html = '';
		$count_total = count($obj);
		foreach ($obj as $i => $list) {
			$downloadlink = JURI::base().'index.php?option=com_products' .
			'&controller=download&task=download&id=' . $list->id;
			$title = JFilterOutput::stringURLSafe($list->name);
			$title = str_replace(' ', '-', strtolower($title));
			$list->link = JRoute::_('index.php?option=' . $option .
			'&controller=download&view=ddetail&id=' . $list->id. ':'. $title);
			// ---------------------------------------------
			$html .= '<div class="item_down';
				if (($i+1) == $count_total) $html .= '_last'; 
				if ($count_total == 1) $html .= '_one'; 
			$html .= '">';
			$html .= '<div class="pic_download">'
						.'<a href="'.$list->link.'" title="'.$list->name.'" >'
							.'<img src="'.JURI::base().'images/softwares/'.$list->thumbnail.'" border="0" '
							   .'alt="'.$list->name.'"  />'
						.'</a></div>'
					.'<div class="info_download">'
					.'<h3><a href="'.$list->link.'" >'
				              .$list->name
					.'</a></h3>';
			if ($list->description) { 
				$html .= '<div class="desc_down">'.$list->description.'</div>';
			} 
			$list->group = $this->getNameGroup($list);	
			
			$html .= '<div style="color:#939393; margin:3px 0 0 0;"';
			 		if (($i+1) == $count_total) $html .= 'style="margin:5px 0 0 0;"';  
			 		$html .= '>';
				$html .= '<a class="blue" href="'.$downloadlink.'">Tải về |</a> '
				            .$list->download.' lượt tải về'; 
			$html .='</div>
				</div>
				<div class="cb"></div>	
			</div>';
			
		}
		return $html;
	}
	function getNameGroup($row) {
		$model = &$this->getModel();
		$group = $model->getGroup($row->id);
		$row->group = '';
			$j = 0;
			foreach($group as $result){
				$j++;
				if ($j > 1){
					$row->group .= ', ';
				}
				$row->group .= $result->name;
			}	
		return $row->group;
	}
	function htmlPaging($total, $limit = 6, $limitstart = 0) {
		// ------paging-AJAX---------------------
		include_once JPATH_SITE.DS.'components'.DS.'com_products'.DS.'Paging.class.php';
		$pagingAjax = new Paging();
		$pageAjax   = $pagingAjax->createPagingAjax($total,1,$limit );
		
		return $pageAjax;
	}
	function creatToken() {
		$session_time =& JFactory::getSession();
		return md5(session_id());
	}
	function addTabA($images) {
		
			$regex = "/<img[^>]+src\s*=\s*[\"']\/?([^\"']+)[\"'][^>]*\>/";
	    	preg_match_all ($regex, $images, $matches);
	    	$imgs  = (count($matches)) ? $matches : array();
	
	    	preg_match_all ("/<div[^>]*>(.*)<\/div>/", $images, $ct);
	    	$content = (count($ct)) ? $ct : array();
	    	
	    	$result = array();
	    	$result['img'] = $imgs;
	    	$result['ct']  = $content[1];
	    	
	    	return $result;
	
	}
}
?>