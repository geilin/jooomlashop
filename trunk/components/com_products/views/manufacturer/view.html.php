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
class ProductViewManufacturer extends JView
{
	function display($tpl = null)
	{
		global $option, $mainframe;
		
		// config 
		//$params =& $mainframe->getPageParameters('com_products');
		$params = &JComponentHelper::getParams( 'com_products' );

		if((int)$params->get('limitPage','')){
			$limit = (int)$params->get('limitPage','');
		}else{
			$limit = 15;
		}

		$layout = JRequest::getVar('layout', 'default');	
		
		$limitstart = JRequest::getVar('limitstart', 0);
		$mid = JRequest::getInt('mid', 0);
		$catid = JRequest::getVar('catid', '');
		$getSize = JRequest::getInt('size', 0);
		
		$model = &$this->getModel();
		
		
		$listProduct = $model->getListProduct($limit, $limitstart);
		
		$total = $model->getTotal();
		
		$pagination = new JPagination($total, $limitstart, $limit);
		
		$this->assignRef('listProduct', $listProduct);
		$this->assignRef('total', $total);
		//$this->assignRef('catName', $catName);
		//$this->assignRef('titleCatName', $titleCatName);		
		$this->assignRef('mid', $mid);
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