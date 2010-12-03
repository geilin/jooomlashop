<?php
/**
* @version		1.0  - 	Joomla 1.5.x
* @package	Component Administrator Com Products
* @copyright	Wampvn Group
* @license		GNU/GPL
* @website          http://wampvn.com
* @description    view manufacturer.
*/

defined( '_JEXEC' ) or die( 'Restricted access' );
jimport('joomla.application.component.view');
class ProductViewManufacturer extends JView
{
	function display($tpl = null)
	{
		global $mainframe;
		$task = JRequest::getVar( 'task' );					
		$limit = JRequest::getVar('limit',$mainframe->getCfg('list_limit'));
		$limitstart = JRequest::getVar('limitstart', 0);
		
		if ($task == '' or $task == 'cancel') 
		{
			
			JToolBarHelper::title( JText::_( 'QUẢN LÝ NHÀ SẢN XUẤT' ) );

			JSubMenuHelper::addEntry( JText::_( 'QUẢN LÝ SẢN PHẨM' ), 'index.php?option=com_products');
			JSubMenuHelper::addEntry( JText::_( 'QUẢN LÝ DANH MỤC' ), 'index.php?option=com_products&controller=category');
			JSubMenuHelper::addEntry( JText::_( 'QUẢN LÝ NHÀ SẢN XUẤT' ), 'index.php?option=com_products&controller=manufacturer',true);
			
			$model = &$this->getModel();
			$manufacturers = $model->getManufacturers();
			$total = $model->getTotal();
			jimport('joomla.html.pagination');
			$total = $total > 0 ? $total : 0;
			$pageNav = new JPagination($total, $limitstart, $limit);

			$this->assignRef('manufacturers', $manufacturers);
			$this->assignRef('total', $total);
			$this->assignRef('pageNav', $pageNav);
		} 
		elseif ($task == "edit" or $task == "add")		
		{
			
			if($task == "edit"){
				JToolBarHelper::title( JText::_( 'CHỈNH SỬA NHÀ SẢN XUẤT' ) );
			}else{
				JToolBarHelper::title( JText::_( 'THÊM NHÀ SẢN XUẤT MỚI' ) );
			}
			$model = &$this->getModel();
			$manufacturer = $model->getManufacturer();
			$lists = $model->getLists();

			$this->assignRef('manufacturer', $manufacturer);			
			$this->assignRef('lists', $lists);		
		}
		parent::display($tpl);
	}
}
?>