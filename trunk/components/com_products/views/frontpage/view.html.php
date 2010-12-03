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
class ProductViewFrontpage extends JView
{
	function display($tpl = null)
	{
		global $option, $mainframe;
		
		// config 
		$params =& $mainframe->getPageParameters('com_products');
		
		$limit = 12;

		
		$model = &$this->getModel();
		
		
		$listNew = $model->getListProduct($limit, $limitstart);
		
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