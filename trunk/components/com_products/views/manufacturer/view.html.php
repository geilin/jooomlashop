<?php

defined( '_JEXEC' ) or die( 'Restricted access' );
jimport('joomla.application.component.view');
jimport('joomla.html.pagination');
class ProductViewManufacturer extends JView
{
	function display($tpl = null)
	{
		global $option, $mainframe;
		
		$params = &JComponentHelper::getParams( 'com_products' );
		
		$limit = $params->get('limitPage', 16);

		$layout = JRequest::getVar('layout', 'default');	
		
		$limitstart = JRequest::getVar('limitstart', 0);
		$mid = JRequest::getInt('mid', 0);
		$catid = JRequest::getVar('catid', '');
		
		$model = &$this->getModel();
		$listProduct = $model->getListProduct($limit, $limitstart);
		
		$total = $model->getTotal();
		
		$pagination 	= new JPagination($total, $limitstart, $limit);
		$manufacture= $model->getManufactureName();
		
		$document =& JFactory::getDocument();    
		
        
        $document->setTitle('Các sản phẩm của '.$manufacture . ' | '. $mainframe->getCfg('sitename')); 
		
		
		$document->setDescription('Các Sản phẩm sản xuất bởi '. $manufacture .' trên ' . $mainframe->getCfg('sitename'));
		
		$this->assignRef('manufacture', $manufacture);
		$this->assignRef('listProduct', $listProduct);
		$this->assignRef('total', $total);
		
		$this->assignRef('mid', $mid);
		$this->assignRef('pagination', $pagination);
		parent::display($tpl);
	}
	
}
?>