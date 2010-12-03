<?php
/**
* @version		1.0  - 	Joomla 1.5.x
* @package		Component Com Products
* @copyright	Wampvn Group
* @license		GNU/GPL
* @website          http://wampvn.com
* @description    view cat accessory.
*/
defined( '_JEXEC' ) or die( 'Restricted access' );
jimport('joomla.application.component.view');
jimport('joomla.html.pagination');
class ProductViewAccessory extends JView
{
	function display($tpl = null)
	{
		global $option, $mainframe;

		// config 
		$params =& $mainframe->getPageParameters('com_products');
		$layout = JRequest::getVar('layout', 'default');	
		if ($layout == 'default'){
			$limit = $params->get('limit1', 12);
		} else {
			$limit = $params->get('limit2', 15);
		}
		$limitstart = JRequest::getVar('limitstart', 0);
		$mid = JRequest::getInt('mid', 0);
		$cid = JRequest::getVar('cid', '');

		// get model
		$model = &$this->getModel();

		$listAccessory = $model->getListAccessory($limit, $limitstart);

		$total = $model->getTotal();
		$catName = $model->getCatName();
		$manufacturers = $model->getManufacturers();
		if (!empty($mid)){
			$manufacturerName = $model->getManufacturerName($mid);
		}
		
		$pagination = new JPagination($total, $limitstart, $limit);
		
		$titleCatName = JFilterOutput::stringURLSafe(trim($catName));
		$titleCatName = str_replace(' ', '-', strtolower($titleCatName));		

		// info view product	
		for($i = 0; $i < count($listAccessory); $i++) {	
			$row =& $listAccessory[$i];
			$title = JFilterOutput::stringURLSafe($row->name);
			$title = str_replace(' ', '-', strtolower($title));
			$row->link = JRoute::_('index.php?option=' . $option .
			'&controller=accessory&view=adetail&id=' . $row->id. ':'. $title);			
		}
		
		for($i = 0; $i < count($manufacturers); $i++) {	
			$row =& $manufacturers[$i];	
			$row->link = JRoute::_('index.php?option=' . $option .
			'&controller=accessory&cid=' . $cid.':'. $titleCatName. '&mid='. $row->id);
		}
		
		
		$isParent = $model->isParent($cid);
		
		// SEO title
		$doc =& JFactory::getDocument();
		$titleSEO = '';
		//$titleSEO = 'Phụ kiện ';
		if (!empty($catName)) {
			if ($isParent) {
				$titleSEO = '';
			} else {
				$titleSEO = 'Phụ kiện ';
			}
			$titleSEO .= $catName;
			$choBB = '';
			if ($isParent) { 
				$choBB = ' cho BlackBerry';
			}
			if (!empty($manufacturerName)){
				$titleSEO = $catName . $choBB. ' | Nhà sản xuất ' . $manufacturerName;
			} else {
				$titleSEO .= $choBB;
			}
		}
		$doc->setTitle($titleSEO);
		$doc->setDescription('Các Sản phẩm '. $catName .' tại BBSAIGON.com - SHOP BAN BLACKBERRY');
		
		if ($model->getParentNameCat($cid)) {
			$parent_cat  = $model->getParentNameCat($cid);
			$catName    .= ' cho '.$parent_cat->name;
		} else {
			$catName = 'Phụ kiện '.$catName;
		}
		
		$this->assignRef('listAccessory', $listAccessory);
		$this->assignRef('manufacturers', $manufacturers);
		$this->assignRef('total', $total);
		$this->assignRef('catName', $catName);
		$this->assignRef('titleCatName', $titleCatName);		
		$this->assignRef('catid', $catid);
		$this->assignRef('manufacturerName', $manufacturerName);
		$this->assignRef('pagination', $pagination);
		parent::display($tpl);
	}
}
?>