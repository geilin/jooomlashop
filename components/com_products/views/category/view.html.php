<?php
/**
* @version		1.0  - 	Joomla 1.5.x
* @package		Component Com Products
* @copyright	Wampvn Group
* @license		GNU/GPL
* @website          http://wampvn.com
* @description    view by category.
*/
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport('joomla.application.component.view');
jimport('joomla.html.pagination');
class ProductViewCategory extends JView
{
	function display($tpl = null)
	{
		global $option, $mainframe;
		
		// config 
		$params =& $mainframe->getPageParameters('com_products');
		
		$limit = 12;

		$layout = JRequest::getVar('layout', 'default');	
		if ($layout == 'default'){
			//$limit = $params->get('limit1', 2);
		} else {
			//$limit = $params->get('limit2', 2);
		}
		$limitstart = JRequest::getVar('limitstart', 0);
		$mid = JRequest::getInt('mid', 0);
		$catid = JRequest::getVar('catid', '');
		$getSize = JRequest::getInt('size', 0);
		$wsize = '&size=0';
		if (!empty($getSize)){
						$wsize = '&size='. $getSize;
		}
		$wmid = '&mid=0';
		if (!empty($mid)){
						$wmid = '&mid='. $mid;
		}
		// get model
		$model = &$this->getModel();
		
		
		$listProduct = $model->getListProduct($limit, $limitstart);
		$info = $model->getInfo();
		$total = $model->getTotal();
		$catName = $model->getCatName();

		$pagination = new JPagination($total, $limitstart, $limit);
		
		$titleCatName = JFilterOutput::stringURLSafe(trim($catName));
		$titleCatName = str_replace(' ', '-', strtolower($titleCatName));		

		// info view product	
		for($i = 0; $i < count($listProduct); $i++) {	
			$row =& $listProduct[$i];
			$title = JFilterOutput::stringURLSafe($row->name);
			$title = str_replace(' ', '-', strtolower($title));
			$row->link = JRoute::_('index.php?option=' . $option .
			'&view=detail&id=' . $row->id.':'.$title);			
			$row->rating = $model->getRating($row->id);
		}
		
		
		// SEO title
		$doc =& JFactory::getDocument();
		$titleSEO = '';
		if (!empty($catName)) {
			$titleSEO = $catName;
			if (!empty($manufacturerName)){
			$titleSEO = $catName . ' | Nhà sản xuất ' . $manufacturerName;
			}
		}
		$doc->setTitle($titleSEO);
		$doc->setDescription('Các Sản phẩm '. $catName .' tại BiBishop.com - SHOP THOI TRANG');
		
		$text_price = $params->get('text_price', 'Sắp có hàng');
		// REF Ass
		$this->assignRef('text_price', $text_price);
		$this->assignRef('listProduct', $listProduct);
		$this->assignRef('total', $total);
		$this->assignRef('catName', $catName);
		$this->assignRef('titleCatName', $titleCatName);		
		$this->assignRef('catid', $catid);
		$this->assignRef('pagination', $pagination);
		parent::display($tpl);
	}
	
	function checkImage($proid){
		$model = &$this->getModel();
		$imgDefault = $model->getImageDefault($proid);
		return $imgDefault->filename;
	}
	
}
?>